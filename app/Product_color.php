<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_color extends Model
{
    protected $fillable = ['colors','style_id','color_active','delete_from_table','product_id'];
}
