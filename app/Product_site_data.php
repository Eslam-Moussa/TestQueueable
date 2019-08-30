<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product_site_data extends Model
{
    protected $fillable = ['Sector_price','Maximum_one','Wholesale_price','Maximum_two','Wholesale_price_two','Maximum_three','Main_bar_code','Main_bar_code_two','datas_active','delete_from_table','product_id','product_sizes_id'];
}
