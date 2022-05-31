<?php

namespace App;

use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Database\Eloquent\Model;

class Ponds_operations extends Model
{

    protected $table = 'ponds';
    protected $fillable =['id','required_area','depth','duration','total_cost',
    'image','place','dec_water_type','plmbing_type','pond_pumps','led_lightning',
    'aqua_plants','filter_type','fish_types','stones_gravel_type'];
}
