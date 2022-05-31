<?php

namespace App;


use App\task_asigning;
use Illuminate\Database\Eloquent\Model;

class Documents extends Model
{
    protected $table="documents";

    protected $fillable =['file'];

   
}
