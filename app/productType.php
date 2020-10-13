<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class productType extends Model
{
    protected $table = 'product_Type';

    protected $fillable = [
        'name', 'sort'
    ];

    public function product_type(){

        return $this->hasMany('app\Producs');
    }
}

