<?php

namespace App\Models;

use App\Models\Delivery_Info;
use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Order_item extends Model
{

    protected $table = 'order_items';
    protected $fillable = [
        'order_id',
        'product_id',
        'product_name',
        'num_of_items',
        'unit_price',
        'product_sub_total',
    ];

    public function products()
    {
        return $this->hasOne(Product::class);
    }
    public function delivery_infos()
    {
        return $this->belongsTo(Delivery_info::class);
    }
 
}
