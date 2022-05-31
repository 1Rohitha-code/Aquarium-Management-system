<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RFQ_Handling_info;

class RFQ_Individual_supplier_activities extends Model
{
    protected $table = 'r_f_q__individual_supplier_activities';
    protected $fillable = ['rfq_ref_id','user_id'];

    public function rfq_doc_handling_infos()
    {
        return $this->belongsTo('App\RFQ_Handling_info');
    }
}
