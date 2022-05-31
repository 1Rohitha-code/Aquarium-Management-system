<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PO_items_temp_place extends Model
{
    protected $fillable = ['product_ids'];

    public function setCatAttribute($value)
    {
        $this->attributes['product_ids'] = json_encode($value);
    }
  
    /**
     * Get the categories
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['product_ids'] = json_decode($value);
    }
}
