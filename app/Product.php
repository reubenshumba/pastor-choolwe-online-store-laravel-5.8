<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes;

    protected $data =['deleted_at'];



    protected $fillable=['productName','ProductSlugName','productPrice','productDescription',
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
          //  $product->productSource=$request->input('productSource');
            $url=$request->file('uploadedFile')->store('uploadedFile','public');
            $product->productUrl=$url;
            $product->productDownloadLink=$url;
            $product->productSource=1;

        }else if($request->has('productUrl') || $product->productUrl !==null){
           // $product->productSource=$request->input('productSource');
            $product->productUrl=$request->input('productUrl');
            $product->productDownloadLink=$request->input('productUrl');
            $product->productSource=2;

        }else if($request->has('productIframe') ){
           // $product->productSource=$request->input('productSource');
            $product->productIframe=$request->input('productIframe')===null ? "<iframe src='#'> </iframe>": $request->productIframe ;
            $product->productUrl=$request->input('productUrl');
            $product->productDownloadLink=$request->input('productDownloadLink');
            $product->productSource=3;

        }

        return $product;
    }

    public function validateProductType($request,$product){
//        if($request->input('productType') == "audio" && $request->has('uploadedFile')){
//            $request->validate([
//                "uploadedFile"=>"required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav,ogg"
//            ]);
////            $productType=ProductType::find(2)->first();
////            $productType->products()->save($product);
//        }else  if($request->input('productType') == "pdf"  && $request->has('uploadedFile')){
//            $request->validate([
//                "uploadedFile"=>"required|mimes:doc,pdf,docx,zip|max:12000"
//            ]);
////            $productType=ProductType::find(1)->first();
////            $productType->products()->save($product);
//        }else if($request->input('productType') == "video"  && $request->has('uploadedFile')){
//            $request->validate([
//                "uploadedFile"=>"required|mimes:video/x-flv,video/mp4,video/3gpp,video/x-msvideo"
//
//            ]);
////            $productType=ProductType::find(3)->first();
////            $productType->products()->save($product);
//        }
//
//        if($request->input('productType') == "audio"){
//
//            $productType=ProductType::find(2)->first();
//            $product->productSource=2;
//
//        }else  if($request->input('productType') == "pdf" ){
//            $productType=ProductType::find(1)->first();
//            $product->productSource=2;
//
//        }else if($request->input('productType') == "video" ){
//            $productType=ProductType::find(3)->first();
//            $product->productSource=2;
//
//        }


        if($request->input('productType') == "audio" && $request->has('uploadedFile')){
            $request->validate([
                "uploadedFile"=>"required|mimes:application/octet-stream,audio/mpeg,mpga,mp3,wav,ogg"
            ]);


        }else  if($request->input('productType') == "pdf"  && $request->has('uploadedFile')){
            $request->validate([
                "uploadedFile"=>"required|mimes:doc,pdf,docx,zip|max:12000"
            ]);


        }else if($request->input('productType') == "video"  && $request->has('uploadedFile')){
            $request->validate([
                "uploadedFile"=>"required|mimes:video/x-flv,video/mp4,video/3gpp,video/x-msvideo"

            ]);


        }
        if($request->input('productType') == "audio"){
            $productType=ProductType::find(2);
            //$product->productSource=2;
            $productType->products()->save($product);
        }else  if($request->input('productType') == "pdf" ){
            $productType=ProductType::find(1);
           // $product->productSource=1;
            $productType->products()->save($product);
        }else if($request->input('productType') == "video" ){
            $productType=ProductType::find(3);
           // $product->productSource=3;
            $productType->products()->save($product);
        }

        return $product;
    }
}
///App\product
