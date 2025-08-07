<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bills;
use App\BillDetails;
use App\Customers;
use App\Categories;
use App\Subcategories;
use Illuminate\Support\Facades\Auth;

class InvoiceController extends Controller
{
    public function index()
    {
        $bills = Bills::where('user_id', Auth::user()->id)->with('billDetails', 'customerDetails', 'user')->get();
        
        return view('invoice.index', compact('bills'));
    }

    public function create()
    {
        $customers = Customers::where('user_id', Auth::user()->id)->get();
        $categories = Categories::where('user_id', Auth::user()->id)->get();
        $subcategories = Subcategories::where('user_id', Auth::user()->id)->get();
        
        return view('invoice.add', compact('customers', 'categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required|exists:customers,id',
            'bill_no' => 'required|string|max:255',
            'date' => 'required|date',
            'type' => 'required|in:0,1', // 0 = without GST, 1 = with GST
            'items' => 'required|array|min:1',
            'items.*.subcategory_id' => 'required|string',
            'items.*.hsn_code' => 'required|string',
            'items.*.number' => 'nullable|numeric',
            'items.*.feet' => 'nullable|numeric',
            'items.*.feet_word' => 'nullable|string',
            'items.*.single_price' => 'required|numeric|min:0',
            'items.*.total_price' => 'required|numeric|min:0',
        ]);

        // Calculate totals
        $subtotal = collect($request->items)->sum('total_price');
        $cgstTotal = 0;
        $sgstTotal = 0;

        // If GST type, calculate GST from GST items
        if ($request->type == 1 && $request->has('gst_items')) {
            $request->validate([
                'gst_items' => 'array',
                'gst_items.*.subcategory_id' => 'required|string',
                'gst_items.*.hsn_code' => 'required|string',
                'gst_items.*.number' => 'nullable|numeric',
                'gst_items.*.feet' => 'nullable|numeric',
                'gst_items.*.feet_word' => 'nullable|string',
                'gst_items.*.single_price' => 'required|numeric|min:0',
                'gst_items.*.total_price' => 'required|numeric|min:0',
                'gst_items.*.cgst' => 'required|numeric|min:0',
                'gst_items.*.sgst' => 'required|numeric|min:0',
            ]);

            foreach ($request->gst_items as $gstItem) {
                $totalPrice = $gstItem['total_price'];
                $cgstTotal += ($totalPrice * $gstItem['cgst']) / 100;
                $sgstTotal += ($totalPrice * $gstItem['sgst']) / 100;
            }
        }

        $bill = Bills::create([
            'user_id' => Auth::user()->id,
            'cust_id' => $request->customer,
            'bill_no' => $request->bill_no,
            'date' => $request->date,
            'type' => $request->type,
            'estimated_total' => $subtotal,
            'cgst' => $cgstTotal,
            'sgst' => $sgstTotal,
            'total' => $subtotal + $cgstTotal + $sgstTotal,
        ]);

        // Create regular items
        foreach ($request->items as $item) {
            $subcategory = Subcategories::where('id', $item['subcategory_id'])->first();
            $category = Categories::where('id', $subcategory->cat_id)->first();
            BillDetails::create([
                'user_id' => Auth::user()->id,
                'cust_id' => $request->customer,
                'bill_id' => $bill->id,
                'cat_id' => $category->id, // Default category       
                'subcat_id' => $subcategory->id, // Default subcategory
                'name' => $category->name . ' ' . $subcategory->name,
                'hsncode' => $item['hsn_code'],
                'number' => $item['number'] ?? '',
                'feet' => $item['feet'] ?? '',
                'feet_word' => $item['feet_word'] ?? '',
                'single_price' => $item['single_price'],
                'total_price' => $item['total_price'],
            ]);
        }

        // Create GST items if present
        if ($request->type == 1 && $request->has('gst_items')) {
            foreach ($request->gst_items as $gstItem) {
                $subcategory = Subcategories::where('id', $gstItem['subcategory_id'])->first();
                $category = Categories::where('id', $subcategory->cat_id)->first();
                BillDetails::create([
                    'user_id' => Auth::user()->id,
                    'cust_id' => $request->customer,
                    'bill_id' => $bill->id,
                    'cat_id' => $category->id, // Default category
                    'subcat_id' => $subcategory->id, // Default subcategory
                    'name' => $category->name . ' ' . $subcategory->name,
                    'hsncode' => $gstItem['hsn_code'],
                    'number' => $gstItem['number'] ?? '',
                    'feet' => $gstItem['feet'] ?? '',
                    'feet_word' => $gstItem['feet_word'] ?? '',
                    'single_price' => $gstItem['single_price'],
                    'total_price' => $gstItem['total_price'],
                ]);
            }
        }

        return redirect()->route('invoice.index')->with('success', 'Invoice created successfully!');
    }

    public function show($id)
    {
        $bill = Bills::where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->with('billDetails', 'customerDetails')
                    ->firstOrFail();
        
        return view('invoice.view', compact('bill'));
    }

    public function edit($id)
    {
        $bill = Bills::where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->with('billDetails', 'customerDetails')
                    ->firstOrFail();
        
        $customers = Customers::where('user_id', Auth::user()->id)->get();
        $categories = Categories::where('user_id', Auth::user()->id)->get();
        $subcategories = Subcategories::where('user_id', Auth::user()->id)->get();
        
        return view('invoice.edit', compact('bill', 'customers', 'categories', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $bill = Bills::where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->firstOrFail();

        $request->validate([
            'customer' => 'required|exists:customers,id',
            'bill_no' => 'required|string|max:255',
            'date' => 'required|date',
            'type' => 'required|in:0,1',
            'items' => 'required|array|min:1',
            'items.*.name' => 'required|string',
            'items.*.hsn_code' => 'required|string',
            'items.*.number' => 'nullable|numeric',
            'items.*.feet' => 'nullable|numeric',
            'items.*.feet_word' => 'nullable|string',
            'items.*.single_price' => 'required|numeric|min:0',
            'items.*.total_price' => 'required|numeric|min:0',
        ]);

        // Calculate totals
        $subtotal = collect($request->items)->sum('total_price');
        $cgstTotal = 0;
        $sgstTotal = 0;

        // If GST type, calculate GST from GST items
        if ($request->type == 1 && $request->has('gst_items')) {
            $request->validate([
                'gst_items' => 'array',
                'gst_items.*.name' => 'required|string',
                'gst_items.*.hsn_code' => 'required|string',
                'gst_items.*.number' => 'nullable|numeric',
                'gst_items.*.feet' => 'nullable|numeric',
                'gst_items.*.feet_word' => 'nullable|string',
                'gst_items.*.single_price' => 'required|numeric|min:0',
                'gst_items.*.total_price' => 'required|numeric|min:0',
                'gst_items.*.cgst' => 'required|numeric|min:0',
                'gst_items.*.sgst' => 'required|numeric|min:0',
            ]);

            foreach ($request->gst_items as $gstItem) {
                $totalPrice = $gstItem['total_price'];
                $cgstTotal += ($totalPrice * $gstItem['cgst']) / 100;
                $sgstTotal += ($totalPrice * $gstItem['sgst']) / 100;
            }
        }

        $bill->update([
            'cust_id' => $request->customer,
            'bill_no' => $request->bill_no,
            'date' => $request->date,
            'type' => $request->type,
            'estimated_total' => $subtotal,
            'cgst' => $cgstTotal,
            'sgst' => $sgstTotal,
            'total' => $subtotal + $cgstTotal + $sgstTotal,
        ]);

        // Delete existing bill details
        BillDetails::where('bill_id', $bill->id)->delete();

        // Create new regular items
        foreach ($request->items as $item) {
            BillDetails::create([
                'user_id' => Auth::user()->id,
                'cust_id' => $request->customer,
                'bill_id' => $bill->id,
                'cat_id' => 1, // Default category
                'subcat_id' => 1, // Default subcategory
                'name' => $item['name'],
                'hsncode' => $item['hsn_code'],
                'number' => $item['number'] ?? '',
                'feet' => $item['feet'] ?? '',
                'feet_word' => $item['feet_word'] ?? '',
                'single_price' => $item['single_price'],
                'total_price' => $item['total_price'],
            ]);
        }

        // Create new GST items if present
        if ($request->type == 1 && $request->has('gst_items')) {
            foreach ($request->gst_items as $gstItem) {
                BillDetails::create([
                    'user_id' => Auth::user()->id,
                    'cust_id' => $request->customer,
                    'bill_id' => $bill->id,
                    'cat_id' => 1, // Default category
                    'subcat_id' => 1, // Default subcategory
                    'name' => $gstItem['name'],
                    'hsncode' => $gstItem['hsn_code'],
                    'number' => $gstItem['number'] ?? '',
                    'feet' => $gstItem['feet'] ?? '',
                    'feet_word' => $gstItem['feet_word'] ?? '',
                    'single_price' => $gstItem['single_price'],
                    'total_price' => $gstItem['total_price'],
                ]);
            }
        }

        return redirect()->route('invoice.index')->with('success', 'Invoice updated successfully!');
    }

    public function destroy($id)
    {
        $bill = Bills::where('id', $id)
                    ->where('user_id', Auth::user()->id)
                    ->firstOrFail();
        
        $bill->delete();
        
        return redirect()->route('invoice.index')->with('success', 'Invoice deleted successfully!');
    }
} 