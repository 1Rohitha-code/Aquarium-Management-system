<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Quotation_items_info;

class QuotationHandling_info extends Model
{
    protected $table = 'quotation_handling_infos';
    protected $fillable = ['rfq_ref_id'];

    public function quotation_items_info()
    {
        return $this->hasMany('App\Quotation_items_info');
    }
}
