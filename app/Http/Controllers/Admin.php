<?php

namespace App\Http\Controllers;

use App\User as USER;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
{
    public function index(){
    	return view('admin.login');
    }
    public function login(Request $request){
    	$user = USER::where('login', '=', $request->login)->first();
        if($user === false){
            $retorno['status'] = "ERRO";
            $retorno['error_code'] = 0;
            echo json_encode($retorno);
            return;
        }
        if(!Hash::check($request->senha, $user->password)){
            $retorno['status'] = "ERRO";
            $retorno['error_code'] = 1;
            echo json_encode($retorno);
            return;
        }
        $retorno['status'] = 'OK';
    	echo json_encode($retorno);
    }
}
