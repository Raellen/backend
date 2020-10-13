<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class products extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name', 'product_img', 'price','info','info_img','type_id','date'
    ];

    public function product_type(){

        return $this->belongsTo('App\ProductType','type_id');
    }
}

