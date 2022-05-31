<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Completed_order extends Model
{
    protected $dates = ['order_completed_date'];

    protected $fillable = [
        'order_id',
    ];

   
  
}
