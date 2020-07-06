<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductUser;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductUser  $purchase
     * @return \Illuminate\Http\Response
     */
    public function show(ProductUser $purchase)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductUser  $purchase
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductUser $purchase)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductUser  $purchase
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductUser $purchase)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductUser  $purchase
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductUser $purchase)
    {
        //
    }

    public function getProductPerUser()
    {
        $user=Auth::user();
        $purchasedProducts=$user->purchasedProducts()->paginate(8);
       // return $purchasedProducts;
        return view('dashboard.index',
            ["purchasedProducts"=>$purchasedProducts]);
    }
    public function playPurchasedProduct($id)
    {
        $user=Auth::user();
        $purchasedProducts=$user->purchasedProducts()->paginate(8);
        $selectedProduct=Product::find($id);
         //return $selectedProduct;
        return view('dashboard.show',[
            "selectedProduct"=>$selectedProduct,
            "purchasedProducts"=>$purchasedProducts
        ]);
    }

    public function addToCart($productId)
    {

    }

    public function checkout($productId)
    {

    }
}
