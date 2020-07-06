<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable=['categoryName','categorySlugName','categoryDescription'];

    public function products(){
        return $this->belongsToMany("App\Product",'category_product')->withTimestamps();
    }

    //Replace space from category Name
    public function slugNameGenerate($categoryName){
        return  preg_replace('/\s+/', '-', $categoryName);
    }

    public function displaySlugNameGenerate($categorySlugName){
        return  preg_replace('-', '/\s+/', $categorySlugName);
    }
}
