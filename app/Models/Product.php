<?php

namespace App\Models;

use App\Models\Order_item;
use App\Models\Fishfood_details;
use App\Models\Medicines_details;
use App\Models\Decoration_details;
use App\Models\Plant_details;
use App\Models\Fish_details;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function fish_details()
    {
        return $this->hasMany('App\Fish_details');
    }
    public function plant_details()
    {
        return $this->hasMany('App\Plant_details');
    }

    public function decoration_details()
    {
        return $this->hasMany('App\Decoration_details');
    }

    public function medicine_details()
    {
        return $this->hasMany('App\Medicines_details');
    }

    public function fishfood_details()
    {
        return $this->hasMany('App\Fishfood_details');
    }


    public function order_items()
    {
        return $this->belongsToMany('App\order_items');
    }

}
