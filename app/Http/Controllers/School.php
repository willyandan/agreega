<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class School extends Controller
{
    public function register(Request $request){
    	$admin = $request->session()->get('admin');
    	return view('admin.school')->with('admin', $admin);
    }
}
