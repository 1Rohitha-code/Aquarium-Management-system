<?php

namespace App\Models;

use App\Models\Delivery_Info;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task_asigning extends Model
{

   
    use SoftDeletes;

 
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'asign_for','email','reason',
    ];

    public function getDeletedAtAttribute($value){
        return Carbon::parse($value)->format('Y-m-d');
       
    }

    public function delivery__information()
    {
        return $this->belongsTo(Delivery_Info::class);
    }
 


}
