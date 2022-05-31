<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RFQ_Handling_info;

class RFQ_Content_info extends Model
{
    protected $table = 'r_f_q__content_infos';
    protected $fillable = ['rfq_ref_id'];

    public function rfq_doc_handling_infos()
    {
        return $this->belongsTo('App\RFQ_Handling_info');
    }
}
