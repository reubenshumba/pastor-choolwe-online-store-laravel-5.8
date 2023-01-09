<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Product;
use App\ProductType;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * ['productName','productSlugName','productPrice','productDescription',
    'productFeaturedImage','productLongDescription','productRelease','productOwner',
    'productUrl','productDownloadLink','productIframe','productDownloadLimit'];
     */
    public function index()
    {

        $trashed = Product::onlyTrashed()->paginate(5);

        $products = Product::orderBy('id', 'desc')->paginate(5);


        return view("admin.products.index",["products"=>$products,
            "trashed"=>$trashed]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::select()->get();
        $productTypes = productType::select()->get();
        return view("admin.products.create",[
            "categories"=>$categories,
            "productTypes"=>$productTypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product =new Product();
        $user = Auth::user();
        $request->validate([
            "productName"=>"required|unique:products",
            "productPrice"=>"required",
            "productDescription"=>"required",
            "productFeaturedImage"=>"required|image",
            "productType"=>"required|not_in:-1",
            "productSource"=>"required|not_in:-1",

        ]);

        $category =$request->input("productCategories")=== null ? [] : $request->input("productCategories");
      //  dd($category);

        $product->productName=$request->input('productName');
        $product->productSlugName=$product->slugNameGenerate($request->input('productName'));
        $product->productPrice=$request->input('productPrice');
        $product->productDescription=$request->input('productDescription');
        $product->productLongDescription=$request->input('productLongDescription');
        $product->productRelease=$request->input('productRelease');
        $product->productOwner=$request->input('productOwner') ===null ? "Pastor Choolwe": $request->productOwner ;
        $product->productIframe=$request->input('productIframe')=== null ? null : $request->productIframe ;
        $product->productDownloadLimit =$request->input('productDownloadLimit')=== null ?
            3 : $request->productDownloadLimit;
        $product->user_id=$user->id;
        $product=$product->productSource($request,$product);
        $product=$product->validateProductType($request,$product);
        $product->save();
        $product->categories()->attach(array_merge($category,[]));

        return redirect()->route("admin.products.index")->with('success',"Successful added the product");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($product)
    {

        //return $product;
        $product = Product::where("productSlugName","=",$product)->get()->first();
        $products =Product::inRandomOrder()->where("user_id","=","" .Auth::user()->id)->limit(4)->get();
        return view("admin.products.show",["product"=>$product,"products"=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($product)
    {
        $product = Product::find($product);
        $categories = Category::select()->get();
        $productTypes = productType::select()->get();

        return view("admin.products.edit",[
            "product"=>$product,
            "categories"=>$categories,
            "productTypes"=>$productTypes
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param   $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $product =Product::find($id);
        $user = Auth::user();
        $request->validate([
            "productName"=>"required",
            "productPrice"=>"required",
            "productDescription"=>"required",
            "productFeaturedImage"=>"image",

        ]);


//        $product->productUrl=$request->input('productUrl')===null?$product->productUrl:$request->input('productUrl');
//        $product->productIframe=$request->input('productIframe')=== null ? $product->productIframe : $request->productIframe ;

        $product->productName=$request->input('productName');
        $product->productSlugName=$product->slugNameGenerate($request->input('productName'));
        $product->productPrice=$request->input('productPrice');
        $product->productDescription=$request->input('productDescription');
        $product->productLongDescription=$request->input('productLongDescription');
        $product->productRelease=$request->input('productRelease');
        $product->productOwner=$request->input('productOwner') ===null ? "Pastor Choolwe": $request->productOwner ;
        $product->productDownloadLimit=$request->input('productDownloadLimit')=== null ? $product->productDownloadLimit : $request->productDownloadLimit;
        $product->user_id=$user->id;
        $product->categories()->sync($request->input("productCategories")===null ? [] : $request->input("productCategories"));
        $product=$product->productSource($request,$product);
        $product=$product->validateProductType($request,$product);
        //$product->save();
        return redirect()->route("admin.products.index")->with('success',"Successful edit the <a href=".route('admin.products.show',['slugName'=>$product->productSlugName]).">product</a>");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param    $product
     * @param  $forceDelete  $product

     * @return \Illuminate\Http\Response
     */
    public function destroy($product,$forceDelete)
    {
        if($forceDelete ==0){

            $product=Product::destroy($product);
            if($product){
                return redirect()->route("admin.products.index")->with('success',"Successful Deleted the product to trash");
            }
            else{
                return redirect()->back()->withErrors(" Could not delete the product");
            }

        }else if($forceDelete ==1){
           // return $product;

            $products=Product::onlyTrashed()->find($product)->restore();

            if($products){

                return redirect()->route("admin.products.index")->with('success',"Successful restored the product from trash");
            }
            else{
                return redirect()->back()->withErrors(" Could not restored the product");
            }

        }else if($forceDelete ==-1){
            $product=Product::withTrashed()
                ->where("id",$product)
                ->forceDelete();
            if($product){
                return redirect()->route("admin.products.index")->with('success',"Successful Deleted the product to trash");

            }
            else{
                return redirect()->back()->withErrors(" Could not delete the product");
            }

        }

        return redirect()->back()->withErrors(" You can not perform this operation");
    }

    public function download($id){
        //return Storage::download('file.jpg', $name, $headers);
    }
}
