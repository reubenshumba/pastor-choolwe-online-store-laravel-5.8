<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $data =['deleted_at'];

    protected $fillable=['productName','productSlugName','productPrice','productDescription',
    'productFeaturedImage','productLongDescription','productRelease','productOwner',
        'productUrl','productDownloadLink','productIframe','productDownloadLimit,productSource'];

    //relationship
    public function user(){
        return $this->belongsTo("App\User");
    }
    public function productType(){
        return $this->belongsTo("App\ProductType");
    }
    public function categories(){
        return $this->belongsToMany("App\Category",'category_product')->withTimestamps();;
    }

    public function users(){
        return $this->belongsToMany("App\User","product_user","product_id","user_id");
    }

    //mutation
    //Replace space from category Name
    public function slugNameGenerate($categoryName){
        return  preg_replace('/\s+/', '-', $categoryName);
    }

    public function displaySlugNameGenerate($categorySlugName){
        return  preg_replace('-', '/\s+/', $categorySlugName);
    }

    public function price($productPrice){
        return  "K".number_format ( $productPrice,2 , "." ,  "," );
    }


    //helper methods
    public function productSource($request,$product){

        if($request->has('productFeaturedImage')){
            $product->productFeaturedImage=$request->file('productFeaturedImage')->store('productFeaturedImage','public');
        }

        if($request->has('uploadedFile')){
            $url=$request->file('uploadedFile')->store('uploadedFile','public');
            if ($request->has('uploadedFile')) {
                $product->productUrl = $url;
                $product->productDownloadLink = $url;
                $product->productSource = 1;
            }else{
                $product->productUrl =null;
            }

        }elseif($request->has('productUrl') || $product->productUrl !==null){
            if ($request->has('productUrl')){
                $product->productUrl=$request->input('productUrl');
                $product->productDownloadLink=$request->input('productUrl');
                $product->productSource=2;
            }else{
                $product->productUrl=null;
            }


        }elseif($request->has('productIframe') || $product->productIframe !==null ){

            if ( $request->input('productIframe')){
                $product->productUrl=$request->input('productUrl');
                $product->productDownloadLink=$request->input('productDownloadLink');
                $product->productSource=3;
                $product->productIframe=$request->input('productIframe');
            }else{
                $product->productIframe= "" ;
            }

        }

        return $product;
    }

    public function validateProductType($request,$product){
        $productType=ProductType::find($request->input('productType'));
        if($request->has('uploadedFile')){
            $request->validate([
                "uploadedFile"=>"required|mimes:".$productType->format
            ]);
        }
        $productType->products()->save($product);
        return $product;

    }
}
