<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Exceptions\InvalidRowIDException;
use Gloudemans\Shoppingcart\Exceptions;

class CartController extends Controller
{


//    public function __construct()
//    {
//        $this->middleware('auth:web');
//    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Cart::count()<=0){
           return redirect()->route("main.index")->with("success","Your cart is empty");
        }
        $cartProducts =Cart::content();
        //return $cart->id;
        return view('products.cart.index',["cartProducts"=>$cartProducts])->with("success",Cart::count()." products in cart");
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
     *show
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function addToCart($id)
    {
//        try{
//
//        }catch (Exception $e){
//
//        }
        //Cart::destroy();
        $product = Product::find($id);
       // return $product;
        Cart::add($id, $product->productName, 1, $product->productPrice)->associate("App\Product");
        //return Cart::content();
        //Cart::destroy();
        return redirect()->back()->with("success","Successful added <b><a href=".
            route("products.show",['id'=>$id]).">$product->productName </a></b> to cart. Veiw <b><a href=".
            route("products.cart.index")."> my cart </a></b> ");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{
            Cart::remove($id);
            return redirect()->back()->with("success","Successful removed the product from cart");
        }catch (InvalidRowIDException $e){
            return redirect()->back()->withErrors("The cart does not contain the Product you want to remove");
        }

    }
}
