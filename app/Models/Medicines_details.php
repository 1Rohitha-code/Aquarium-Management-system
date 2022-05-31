<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;

class Medicines_details extends Model
{
    public function product()
    {
        return $this->belongsTo('App\Product');
    }
}
