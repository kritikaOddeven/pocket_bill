<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Customers;

class WoGSTCustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customers::where('user_id',Auth::user()->id)->get();
        return $this->apiResponse(true, "Customers Get Successfully.", null, $customers,200);
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
            'name' => 'required|max:255',
            'address' => 'required',
            'city' => 'required|max:255',
            // 'gst_no' => 'required|max:255|unique:customers,gst_no,NULL,id,user_id,'.$userId,
            'mobile_no' => 'required|max:255',
        ]);
        if ($validator->fails()) { 
            return $this->apiResponse(false, "Invalid Data.", $validator->errors(), null,400);
        }
        $input = $request->all(); 
        $input['user_id'] = Auth::user()->id;
        $input['gst_no'] = "";

        if(Customers::create($input)){
            return $this->apiResponse(true, "Customer Created.", null, null,201);
        }else{
            return $this->apiResponse(false, "Customer Not Created.", null, null,502);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $customer = Customers::find($id);
        if(!$customer){
            return $this->apiResponse(false, "Customer Not Found.", null, $customer,404);
        }
        return $this->apiResponse(true, "Customer Get Successfully.", null, $customer,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userId = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'address' => 'required',
            'city' => 'required|max:255',
            // 'gst_no' => 'required|max:255|unique:customers,gst_no,'.$id.',id,user_id,'.$userId,
            'mobile_no' => 'required|max:255',
        ]);
        if ($validator->fails()) { 
            return $this->apiResponse(false, "Invalid Data.", $validator->errors(), null,400);
        }
        
        $input = $request->all();
        $input['gst_no'] = "";
        if(Customers::find($id)->update($input)){
            return $this->apiResponse(true, "Customer Updated.", null, null,200);
        }else{
            return $this->apiResponse(false, "Customer Not Updated.", null, null,304);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customers  $customers
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customers::find($id);
        if($customer){
            if($customer->delete()){
                return $this->apiResponse(true, "Customer Deleted.", null, null,200);
            }else{
                return $this->apiResponse(false, "Customer Not Deleted.", null, null,404);
            }
        }else{
            return $this->apiResponse(false, "Customer Not Found.", null, null,404);
        }
    }
}
