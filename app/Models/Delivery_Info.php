<?php

namespace App\Models;


use App\User;
use App\Models\Order_item;
use App\Models\Task_asigning;
use Illuminate\Database\Eloquent\Model;


class Delivery_Info extends Model
{

   
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function order_items()
    {
        return $this->hasMany(Order_item::class);
        
    }
    public function tasks()
    {
        return $this->hasOne(Task_asigning::class);
        
    }
    
}
