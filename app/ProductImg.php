<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    protected $table = 'productImgs';

    protected $fillable = [
        'product_img', 'type_id','sort'
    ];

    public function product_type(){

        return $this->belongsTo('App\ProductType','type_id');
    }

}
