<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Categories;
use App\Subcategories;
use Illuminate\Validation\Rule;

class SubcategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subcategories = Subcategories::where('user_id',Auth::user()->id)->get();
        return $this->apiResponse(true, "Subcategories Get Successfully.", null, $subcategories,200);
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
            'category' => 'required|integer|exists:categories,id,user_id,'.$userId,
            'name' => 'required|max:255|unique:subcategories,name,NULL,id,cat_id,'.$request->category.',user_id,'.$userId,
        ]);
        
        if ($validator->fails()) { 
            return $this->apiResponse(false, "Invalid Data.", $validator->errors(), null,400);
        }

        $input = array();
        $input['user_id'] = $userId;
        $input['cat_id'] = $request->category;
        $input['name'] = $request->name;

        if(Subcategories::create($input)){
            return $this->apiResponse(true, "Subcategory Created.", null, null,201);
        }else{
            return $this->apiResponse(false, "Subcategory Not Created.", null, null,502);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $subcategory = Subcategories::find($id);
        if(!$subcategory){
            return $this->apiResponse(false, "Subcategory Not Found.", null, $subcategory,404);
        }
        return $this->apiResponse(true, "Subcategory Get Successfully.", null, $subcategory,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function edit(Subcategories $subcategories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userId = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            'category' => 'required|integer|exists:categories,id,user_id,'.$userId,
            'name' => 'required|max:255|unique:subcategories,name,'.$id.',id,cat_id,'.$request->category.',user_id,'.$userId,
            // 'name' => 'required|max:255|unique:categories,name,'.$id.',id,user_id,'.$userId,
        ]);
        if ($validator->fails()) { 
            return $this->apiResponse(false, "Invalid Data.", $validator->errors(), null,400);
        }

        $input = array();
        $input['cat_id'] = $request->category;
        $input['name'] = $request->name;
        
        if(Subcategories::find($id)->update($input)){
            return $this->apiResponse(true, "Subcategory Updated.", null, null,200);
        }else{
            return $this->apiResponse(false, "Subcategory Not Updated.", null, null,304);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Subcategories  $subcategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $userId = Auth::user()->id;
        $subcategory = Subcategories::where('id',$id)->where('user_id',$userId)->first();
        if($subcategory){
            if($subcategory->delete()){
                return $this->apiResponse(true, "Subcategory Deleted.", null, null,200);
            }else{
                return $this->apiResponse(false, "Subcategory Not Deleted.", null, null,404);
            }
        }else{
            return $this->apiResponse(false, "Subcategory Not Found.", null, null,404);
        }
    }

    public function subcategorylist(Request $request, $catId)
    {
        $userId = Auth::user()->id;
        $subcategories = Subcategories::where('cat_id',$catId)->where('user_id',$userId)->get();
        return $this->apiResponse(true, "Subcategories Get Successfully.", null, $subcategories,200);
    }
}
