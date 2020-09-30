<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table='location_info';
    protected $fillable =[
        'email','location','img_url','location_name','location_description'
    ];
}
