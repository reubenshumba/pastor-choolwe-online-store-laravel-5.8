<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductUser extends Model
{
    use SoftDeletes;

    protected $data =['deleted_at'];


}
