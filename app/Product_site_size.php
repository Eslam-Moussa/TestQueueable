<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_site_size extends Model
{
    protected $fillable = ['size_value_id','size_number','size_value_open','size_active','delete_from_table','product_id','product_color_id'];
}
