<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address as ADDRESS;
use App\City as CITY;
class School extends Controller
{
    public function register(Request $request){

    	$admin = $request->session()->get('admin');
    	$address = ADDRESS::find($admin->person->school->id_address);
    	$city = CITY::find($address->id_city);
    	return view('admin.school')
    		->with('admin', $admin)
    		->with('address', $address)
    		->with('city', $city);
    }
}
