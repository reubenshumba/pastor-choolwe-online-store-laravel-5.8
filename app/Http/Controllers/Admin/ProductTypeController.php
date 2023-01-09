<?php

namespace App\Http\Controllers\Admin;

use App\ProductType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productTypes = ProductType::orderBy('id', 'desc')->paginate(5);
        return view("admin.productTypes.index",["productTypes"=>$productTypes]);
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
        $this->validate($request,[
            "productTypeName"=>"required|unique:product_types|max:255|min:3",
            "productTypeDescription" =>"required|max:255|min:3",
            "format"=>"required",
        ]);
        $productType = new ProductType();
        $productType->productTypeName =strtolower($request->input("productTypeName"));
        $productType->productTypeDescription =$request->input("productTypeDescription");
        $productType->format = $request->input("format");
        $productType->save();
        if(!$productType){
            return redirect()->back()->withErrors("Could not add the product type");
        }
        return redirect()->route("productTypes.index")->with("success","Successful added ".
            $productType->productTypeName." Product Type ");

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $productType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductType $productType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$productType)
    {

        $this->validate($request,[
            "productTypeName"=>"required|max:255|min:3",
            "productTypeDescription" =>"required|max:255|min:3",
            "format"=>"required",
        ]);
        $productType =ProductType::find($productType);
        $productType->productTypeName =$request->input("productTypeName");
        $productType->productTypeDescription =$request->input("productTypeDescription");
        $productType->format =$request->input("format");

        $productType->save();
        if(!$productType){
            return redirect()->back()->withErrors("Could not update the product type");
        }
        return redirect()->route("productTypes.index")->with("success","Successful edited Product Type");
       // return $request;//->input("productTypeName");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductType  $productType
     * @return \Illuminate\Http\Response
     */
    public function destroy($productType)
    {

        $productType = ProductType::find($productType);
        //$products =Product::where('product_type_id',$productType)->delete();
        $productType->products()->delete();
        $productType = $productType->delete();
        if(!$productType){
            return redirect()->back()->withErrors("Could not delete the product type");
        }
        return redirect()->route("productTypes.index")->with("success","Successful Deleted ");
    }
}
