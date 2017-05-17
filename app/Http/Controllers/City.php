<?php

namespace App\Http\Controllers;

use App\City as CITIES;
use App\State as STATE;
use Illuminate\Http\Request;

class City extends Controller
{
    public function getCities(Request $request){
    	return $city = CITIES::where('state_id', $request->state)->orderBy('name')->get();
    }
    public function getStates(Request $request)
    {
 		return $state = STATE::orderBy('abbr')->get();   	
    }
}
