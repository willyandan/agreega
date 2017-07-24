<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Address as ADDRESS;
use App\City as CITY;
use App\School as ESCOLA; 
use App\Matter as MATTER;
class School extends Controller
{
    public function register(Request $request){

    	$admin = $request->session()->get('admin');
    	$address = ADDRESS::find($admin->person->school->id_address);
    	$city = CITY::find($address->id_city);
    	$matters = ESCOLA::find($admin->person->school->id)->matters;
    	return view('admin.school')
    		->with('admin', $admin)
    		->with('address', $address)
    		->with('city', $city)
    		->with('matters', $matters);
    }

    public function update(Request $request){
        $admin = $request->session()->get('admin');
        
        //atualizando escola
        $school = ESCOLA::find($admin->person->school->id);
        $school->name = $request->name;
        $school->save();
        //atualizado endereço
        $address = ADDRESS::find($school->id_address);
        $address->cep = str_replace('-', '', $request->cep);
        $address->id_city = $request->city;
        $address->neighborhood = $request->neighborhood;
        $address->street = $request->street;
        $address->number = $request->number;
        $address->complement = $request->complement;
        $address->save();
        //excluindo matérias
        MATTER::where('id_school', $school->id)->delete();
        
        //adicionando matérias
        foreach ($request->matter as $index => $matter) {
            if(!empty($matter)){
                $materia = new MATTER;
                $materia->matter = $matter;
                $materia->id_person = $request->teacher[$index];
                $materia->id_school = $school->id;
                $materia->save();
            }
        }
        
        //colocando tudo na session novamente
        $admin->person->school = $school;
        $request->session()->get('admin');

        //retornando para o usuário
        return redirect()->route('admin.index');
    }
}
