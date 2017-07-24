<?php

namespace App\Http\Controllers;

use App\User as USER;
use Illuminate\Http\Request;

class Person extends Controller
{
    public function verifyLogin(Request $request){
        $response['status'] = 'OK';
        $user = USER::where('login', $request->login)->count();
        if($user>0){
            $response['status'] = 'ERROR';
            $response['message'] = 'Esse login já está sendo usador por outro usuário';
        }

        return json_encode($response);
    }

    public function verifyEmail(Request $request){
    	$response['status'] = 'OK';
    	$user = USER::where('email', $request->email)->count();
    	if ($user>0) {
    		$response['status'] = 'ERROR';
    		$response['message'] = 'Esse email já está em uso por outro usuário';
    	}
    	return json_encode($response);
    }

    public function verifyRa(Request $request){
    	$response['status'] = 'OK';
        $user = USER::where('ra', $request->ra)->count();
        if ($user > 0) {
            $response['status'] = 'ERROR';
            $response['message'] = 'Esse R.A já está em uso por outro usuário';
        }
        return json_encode($response);
    }
}
