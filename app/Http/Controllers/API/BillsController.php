<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Bills;
use App\BillDetails;
use App\Customers;
use App\User;
use App\Categories;
use App\Subcategories;
use PDF;

class BillsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->customer){
            if($request->type == "0" || $request->type == "1"){
                $bills = Bills::where('user_id',Auth::user()->id)->where('cust_id',$request->customer)->where('type',$request->type)->with('billDetails')->get();    
            }else{
                $bills = Bills::where('user_id',Auth::user()->id)->where('cust_id',$request->customer)->with('billDetails')->get();
            }
        }else{
            $bills = Bills::where('user_id',Auth::user()->id)->with('billDetails')->get();
        }

        foreach ($bills as $bill) {
            $customer = Customers::find($bill->cust_id);
            $bill['cust_city'] = $customer->city;
            $bill['cust_name'] = $customer->name;
        }


        return $this->apiResponse(true, "Bills Get Successfully.", null, $bills,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $userId = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'customer' => 'required|integer|exists:customers,id,user_id,'.$userId,
            'bill_no' => 'required|max:255',
            'date' => 'required|date',
            'estimated_total' => 'required|numeric|min:0',
            'cgst' => 'required|numeric|min:0',
            'sgst' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'type' => 'required|boolean',
            'bill_items' => 'required|json',
        ]);
        if ($validator->fails()) { 
            return $this->apiResponse(false, "Invalid Data.", $validator->errors(), null,400);
        }

        $billData = array();
        $billData['user_id'] = $userId;
        $billData['cust_id'] = $request->customer;
        $billData['bill_no'] = $request->bill_no;
        $billData['date'] = $request->date;
        $billData['estimated_total'] = $request->estimated_total;
        $billData['cgst'] = $request->cgst;
        $billData['sgst'] = $request->sgst;
        $billData['total'] = $request->total;
        $billData['type'] = $request->type;

        $billId = Bills::create($billData)->id;

        if(!$billId){
            return $this->apiResponse(false, "Bill Not Added.", null, null,502);
        }

        $billItems = json_decode($request->bill_items, true);
        foreach ($billItems as $billItem) {
            $billItem['user_id'] = $userId;
            $billItem['cust_id'] = $request->customer;
            $billItem['bill_id'] = $billId;
            $billItem['cat_id'] = $billItem['category'];
            $billItem['subcat_id'] = $billItem['subcategory'];

            $category = Categories::find($billItem['category']);
            $subCategory = Subcategories::find($billItem['subcategory']);
            $billItem['name'] = $category->name." ".$subCategory->name;

            BillDetails :: create ($billItem);
        }
        return $this->apiResponse(true, "Bill Added Successfully.", null, null,201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bills = Bills::where('id',$id)->where('user_id',Auth::user()->id)->with('billDetails')->first();
        if(!$bills){
            return $this->apiResponse(false, "Bill Not Found.", null, $bills,404);
        }
        return $this->apiResponse(true, "Bill Get Successfully.", null, $bills,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function edit(Bills $bills)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userId = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'customer' => 'required|integer|exists:customers,id,user_id,'.$userId,
            'bill_no' => 'required|max:255',
            'date' => 'required|date',
            'estimated_total' => 'required|numeric|min:0',
            'cgst' => 'required|numeric|min:0',
            'sgst' => 'required|numeric|min:0',
            'total' => 'required|numeric|min:0',
            'type' => 'required|boolean',
            'bill_items' => 'required|json',
        ]);
        if ($validator->fails()) { 
            return $this->apiResponse(false, "Invalid Data.", $validator->errors(), null,400);
        }

        $billData = array();
        $billData['cust_id'] = $request->customer;
        $billData['bill_no'] = $request->bill_no;
        $billData['date'] = $request->date;
        $billData['estimated_total'] = $request->estimated_total;
        $billData['cgst'] = $request->cgst;
        $billData['sgst'] = $request->sgst;
        $billData['total'] = $request->total;
        $billData['type'] = $request->type;

        $oldBill = Bills::find($id);
        if(!$oldBill){
            return $this->apiResponse(false, "Bill Not Updated.", null, null,502);
        }
        
        $oldBill->update($billData);
        BillDetails::where('bill_id',$id)->delete();

        $billItems = json_decode($request->bill_items, true);
        foreach ($billItems as $billItem) {
            $billItem['user_id'] = $userId;
            $billItem['cust_id'] = $request->customer;
            $billItem['bill_id'] = $id;
            $billItem['cat_id'] = $billItem['category'];
            $billItem['subcat_id'] = $billItem['subcategory'];

            $category = Categories::find($billItem['category']);
            $subCategory = Subcategories::find($billItem['subcategory']);
            $billItem['name'] = $category->name." ".$subCategory->name;

            BillDetails::create($billItem);
        }
        return $this->apiResponse(true, "Bill Updated Successfully.", null, null,201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bills  $bills
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bill = Bills::find($id);
        if($bill){
            if($bill->delete()){
                BillDetails::where('bill_id',$id)->delete();
                return $this->apiResponse(true, "Bill Deleted.", null, null,200);
            }else{
                return $this->apiResponse(false, "Bill Not Deleted.", null, null,404);
            }
        }else{
            return $this->apiResponse(false, "Bill Not Found.", null, null,404);
        }
    }

    // public function billPdf($id)
    // {
    //     $data = array();
    //     // $bill = Bills::where('user_id',Auth::user()->id)->where('id',$id)->with('billDetails')->get();
    //     $data['bills'] = Bills::where('id',$id)->with('billDetails')->with('customerDetails')->first();
    //     $data['user'] = User::find(1);
    //     // $data['user'] = Auth::user();
          
    //     $pdf = PDF::loadView('billPdf', ['data' => $data]);
    //     //   $pdf = PDF::loadView('billPdf', ['data' => $data])->setPaper('a4', 'landscape');
    //     //   return $pdf->download('medium.pdf');
    //       return $pdf->stream('asda.pdf');
    // }

    public function billPdf($id,$billname)
    {
        $data = array();
        // $bill = Bills::where('user_id',Auth::user()->id)->where('id',$id)->with('billDetails')->get();
        $data['bills'] = Bills::where('id',$id)->with('billDetails')->with('customerDetails')->first();
        $data['user'] = User::find($data['bills']['user_id']);
        // $data['user'] = Auth::user();
        $pdf = PDF::loadView('billPdf', ['data' => $data])->setPaper('a4', 'landscape');
        //   $pdf = PDF::loadView('billPdf', ['data' => $data])->setPaper('a4', 'landscape');
        //   return $pdf->download('medium.pdf');
          return $pdf->stream($billname.'.pdf');
    }

    public function dashboard(){
        $data = array();
        $data['totalBill'] = Bills::where('user_id',Auth::user()->id)->count();
        $data['totalCustomers'] = Customers::where('user_id',Auth::user()->id)->count();
        $data['totalRokdaBill'] = Bills::where('user_id',Auth::user()->id)->where('type',1)->count();
        $data['totalUdharBill'] = Bills::where('user_id',Auth::user()->id)->where('type',0)->count();
        return $this->apiResponse(true, "Data Get Successfully.", null, $data,200);
    }
}
