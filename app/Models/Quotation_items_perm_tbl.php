<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Quotation_items_perm_tbl extends Model
{
    protected $fillable = ['rfq_ref_id','quotation_id','supplier_stock_prod_name','supplier_stock_prod_qty','unit_price','requested_qty'];
}
