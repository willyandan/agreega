<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\User as USER;
use App\Address as ADDRESS;
use App\Person as PERSON;
use \Exception;
use Illuminate\Http\Request;

class Student extends Controller
{
    public function index(Request $request)
    {
    	$admin = $request->session()->get('admin');
        $students = PERSON::where('id_school', $admin->person->school->id)
            ->whereHas('type', function($query){
                $query->where('type','student');
            })
            ->when($request->search, function ($query) use($request){
                return $query->where('name', 'like', '%'.$request->search.'%');
            })
            ->whereHas('user', function($query) use($request){
                $query->where('ra', 'like', '%'.$request->ra.'%');
            })
            ->when($request->minIdade, function($query) use($request){
                $ano = date('Y') - $request->minIdade;
                $val =  mktime( 0, 0, 0, date('m'), date('d'), $ano);
                $data = date('Y-m-d', $val);
                return $query->where('birthday', '<=', $data);
            })
            ->when($request->maxIdade, function($query) use($request){
                $ano = date('Y') - $request->maxIdade;
                $val =  mktime( 0, 0, 0, date('m'), date('d'), $ano);
                $data = date('Y-m-d', $val);
                return $query->where('birthday', '>=', $data);
            })
            ->paginate(15)
            ->appends($request->all);
        $students->map(function($student){
            $student->user;
            list($ano, $mes, $dia) = explode('-', $student->birthday);
            $atual = mktime(0, 0, 0, date('m'), date('d'), date('Y'));
            $niver =  mktime( 0, 0, 0, $mes, $dia, $ano);
            $student->birthday =   floor((((($atual - $niver) /60) /60) /24) /365.25);
        });
        return view('admin.student-list')
    		->with('admin', $admin)
            ->with('students', $students)
            ->with('input', $request->all());
    }

    public function create(Request $request){
        $admin = $request->session()->get('admin');
        return view('admin.student-form')
            ->with('admin', $admin)
            ->with('route', route('admin.aluno.save'));
    }

    public function save(Request $request) 
    {

        //VERIFICAR DADOS
        $login = USER::where('login', $request->login)->count();
        if($login > 0){
            return back()->with('status', 'Login já cadastrado')->withInput($request->all);
        }

        $email = USER::where('email', $request->email)->count();
        if($email > 0){
            return back()->with('status', 'Email já cadastrado')->withInput($request->all);
        }

        $ra = USER::where('ra', $request->ra)->count();
        if ($ra > 0) {
            return back()->with('status', 'R.A já cadastrado')->withInput($request->all);
        }

        //GUARDAR DADOS
        DB::transaction(function() use($request) {
            $admin = $request->session()->get('admin');
            $user = new USER;
            $user->login = $request->login;
            $user->email = $request->email;
            $user->ra = $request->ra;
            $user->password = Hash::make($request->password);
            $user->save();


            $address = new ADDRESS;
            $address->cep = str_replace('-', '', $request->cep);
            $address->id_city = $request->city;
            $address->neighborhood = $request->neighborhood;
            $address->street = $request->street;
            $address->number = $request->number;
            $address->complement = $request->complement;
            $address->save(); 

            $person = new PERSON;
            $person->name = $request->name;
            $person->birthday = $request->birthday;
            $person->id_user = $user->id;
            $person->id_address = $address->id;
            $person->id_school = $admin->person->school->id;
            $person->id_type = 1;
            $person->save();
        });
        return redirect()->route('admin.aluno.index')->with('status', 'Aluno cadastrado com sucesso');
    }

    public function view(Request $request){
        $admin = $request->session()->get('admin');
        $student =  PERSON::where('id', $request->id)->
            where('id_school', $admin->person->school->id)
            ->whereHas('type', function($query){
                $query->where('type','student');
            })->first();
        if(!$student){
            return redirect()->route('admin.aluno.index')->with('error', 'Aluno não econtrado');
        }
        $student->user;
        $student->address;
        $student->birthday = date('d/m/Y', strtotime($student->birthday));
        return view('admin.student-view')
            ->with('admin', $admin)
            ->with('student', $student);
    }

    public function edit(Request $request){
        $admin = $request->session()->get('admin');
        $student =  PERSON::where('id', $request->id)->
            where('id_school', $admin->person->school->id)
            ->whereHas('type', function($query){
                $query->where('type','student');
            })->first();
        if(!$student){
            return redirect()->route('admin.aluno.index')->with('error', 'Aluno não econtrado');
        }
        $student->user;
        $student->address;
        return view('admin.student-form')
            ->with('admin', $admin)
            ->with('student', $student)
            ->with('route', route('admin.aluno.update'));
    }

    public function update(Request $request)
    {
        $student = PERSON::find($request->id);
        $student->user;

        if($request->login != $student->user->login){
            $login = USER::where('login', $request->login)->count();
            if($login > 0){
                return back()->with('status', 'Login já cadastrado')->withInput($request->all); 
            }
        }
        if($request->email != $student->user->email){
            $email = USER::where('email', $request->email)->count();
            if($email > 0){
                return back()->with('status', 'Email já cadastrado')->withInput($request->all);
            }
        }
        if($request->ra != $student->user->ra){
            $ra = USER::where('ra', $request->ra)->count();
            if ($ra > 0) {
                return back()->with('status', 'R.A já cadastrado')->withInput($request->all);
            }
        }
        //GUARDAR DADOS
        DB::transaction(function() use($request) {
            $admin = $request->session()->get('admin');
            $student = PERSON::find($request->id);

            $user = USER::find($student->user->id);
            $user->login = $request->login;
            $user->email = $request->email;
            $user->ra = $request->ra;
            if(!empty($request->password)){
                $user->password = Hash::make($request->password);
            }
            $user->save();


            $address = ADDRESS::find($student->address->id);
            $address->cep = str_replace('-', '', $request->cep);
            $address->id_city = $request->city;
            $address->neighborhood = $request->neighborhood;
            $address->street = $request->street;
            $address->number = $request->number;
            $address->complement = $request->complement;
            $address->save();

            $student->name = $request->name;
            $student->birthday = $request->birthday;
            $student->id_user = $user->id;
            $student->id_address = $address->id;
            $student->id_school = $admin->person->school->id;
            $student->id_type = 1;
            $student->save();
        });
        return redirect()->route('admin.aluno.index')->with('status', 'Aluno atualizado com sucesso');
    }

    public function delete(Request $request){
        if(empty($request->id)){
            return redirect()->route('admin.aluno.index')->with('error', 'Erro interno, tente mais tarde');
        }
        $ids = explode(',', $request->id);
        try {
            foreach ($ids as $index => $id) {
                DB::transaction(function() use($id) {
                    $person = PERSON::find($id);
                    $user = USER::find($person->user->id);
                    $address = ADDRESS::find($person->address->id);

                    if ($person) {
                        $person->delete();
                    }
                    
                    if($address){
                        $address->delete();
                    }

                    if ($user) {
                        $user->delete();
                    }
                });
            }
            return redirect()->route('admin.aluno.index')->with('status', 'Usuários deletados com sucesso');   
        } catch (Exception $e) {
            return redirect()->route('admin.aluno.index')->with('error', 'Erro inesperado tente novamente');
        }
    }
}
