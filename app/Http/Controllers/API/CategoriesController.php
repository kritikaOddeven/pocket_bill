<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth; 
use Validator;
use App\Categories;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categories::where('user_id',Auth::user()->id)->get();
        return $this->apiResponse(true, "Categories Get Successfully.", null, $categories,200);
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
            // 'name' => 'required|max:255|unique:categories',
            'name' => 'required|max:255|unique:categories,name,NULL,id,user_id,'.$userId,
        ]);
        if ($validator->fails()) { 
            return $this->apiResponse(false, "Invalid Data.", $validator->errors(), null,400);
        }
        $input = $request->all(); 
        $input['user_id'] = Auth::user()->id;

        if(Categories::create($input)){
            return $this->apiResponse(true, "Category Created.", null, null,201);
        }else{
            return $this->apiResponse(false, "Category Not Created.", null, null,502);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Categories::find($id);
        if(!$category){
            return $this->apiResponse(false, "Category Not Found.", null, $category,404);
        }
        return $this->apiResponse(true, "Category Get Successfully.", null, $category,200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function edit(Categories $categories)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $userId = Auth::user()->id;
        $validator = Validator::make($request->all(), [
            // 'name' => 'required|max:255|unique:categories,name,'.$id,
            'name' => 'required|max:255|unique:categories,name,'.$id.',id,user_id,'.$userId,
        ]);
        if ($validator->fails()) { 
            return $this->apiResponse(false, "Invalid Data.", $validator->errors(), null,400);
        }
        
        $input = $request->all();
        if(Categories::find($id)->update($input)){
            return $this->apiResponse(true, "Category Updated.", null, null,200);
        }else{
            return $this->apiResponse(false, "Category Not Updated.", null, null,304);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Categories  $categories
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Categories::find($id);
        if($category){
            if($category->delete()){
                return $this->apiResponse(true, "Category Deleted.", null, null,200);
            }else{
                return $this->apiResponse(false, "Category Not Deleted.", null, null,404);
            }
        }else{
            return $this->apiResponse(false, "Category Not Found.", null, null,404);
        }
    }
}
