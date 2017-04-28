<?php

namespace App\Http\Controllers;

use App\User as USER;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class Admin extends Controller
{
    public function index(Request $request){
        if($request->session()->has('admin')){
            return view('admin.dashboard');  
        }
    	return view('admin.login');
    }

    public function login(Request $request){
    	//pegar usário e verificar senha
        $user = USER::where('login', $request->login)->first();
        if(!$user){
            $retorno['status'] = 'ERROR';
            $retorno['error_cod'] = 1;
            echo json_encode($retorno);
            return;
        }

        if(!Hash::check($request->password, $user->password)){
            $retorno['status'] = 'ERROR';
            $retorno['error_cod'] = 1;
            echo json_encode($retorno);
            return;
        }
        //pegar pessoa verificar tipo
        $person = $user->person;
        $type = $person->type->type;
        if($type != 'coordinator'){
            $retorno['status'] = 'ERROR';
            $retorno['error_cod'] = 2;
            echo json_encode($retorno);
            return;
        }
        //pegar escola e verificar se ela é valida
        $school = $person->school;
        if($school->active != 1 ){
            $retorno['status'] = 'ERROR';
            $retorno['error_cod'] = 3;
            echo json_encode($retorno);
            return;
        }
        //colocar tudo na sessão e retornar ok
        $request->session()->put('admin', $user);
        $retorno['status'] = 'OK';
    	echo json_encode($retorno);
    }

    public function logout(Request $request){
        $request->session()->forget('admin');
        return redirect()->route('admin.index');
    }
}
