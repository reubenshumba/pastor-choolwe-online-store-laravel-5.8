<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;

class ProductType extends Model
{
    use SoftDeletes;
    protected $fillable=['productTypeName','productTypeDescription'];

    public function products(){
        return $this->hasMany("App\Product");
    }

    public function stringToLowerCase($productTypeName){
        return strtolower($productTypeName);
    }

}
