<?php

namespace App\Http\Controllers\Services;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RepairAquariumController extends Controller
{
    public function displayform(){
        return view('normal-user-pages.repair_aquarium.display_form');
    }
}
