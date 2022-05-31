<?php

namespace App\Models;



use Illuminate\Database\Eloquent\Model;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\RFQ_Content_info;
use App\Models\RFQ_Individual_supplier_activities;

class RFQ_Handling_info extends Model
{
  protected $table = 'r_f_q__handling_infos';
  protected $fillable = ['response_expected_date'];

  public function rfq_details()
    {
        return $this->hasMany('App\RFQ_Content_info');
        
    }


    public function rfq_suppliers()
    {
        return $this->hasMany('App\RFQ_Individual_supplier_activities');
        
    }

 

  
}
