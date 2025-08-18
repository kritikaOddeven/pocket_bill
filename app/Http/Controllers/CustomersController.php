<?php

namespace App\Http\Controllers;

use App\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomersController extends Controller
{
    /**
     * Display a listing of customers
     */
    public function index()
    {
        $customers = Customers::where('user_id', Auth::id())->orderBy('name')->orderBy('id', 'desc')->paginate(10);
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new customer
     */
    public function create()
    {
        return view('customers.add');
    }

    /**
     * Store a newly created customer
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:20',
            'gst_no' => 'nullable|string|max:50',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:500',
        ]);

        $customer = new Customers();
        $customer->user_id = Auth::id();
        $customer->name = $request->name;
        $customer->mobile_no = $request->mobile_no;
        $customer->gst_no = $request->gst_no;
        $customer->city = $request->city;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer added successfully!');
    }

    /**
     * Show the form for editing the specified customer
     */
    public function edit($id)
    {
        $customer = Customers::where('user_id', Auth::id())->findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified customer
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'mobile_no' => 'required|string|max:20',
            'gst_no' => 'nullable|string|max:50',
            'city' => 'required|string|max:100',
            'address' => 'required|string|max:500',
        ]);

        $customer = Customers::where('user_id', Auth::id())->findOrFail($id);
        $customer->name = $request->name;
        $customer->mobile_no = $request->mobile_no;
        $customer->gst_no = $request->gst_no;
        $customer->city = $request->city;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully!');
    }

    /**
     * Remove the specified customer
     */
    public function destroy($id)
    {
        $customer = Customers::where('user_id', Auth::id())->findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully!');
    }
} 