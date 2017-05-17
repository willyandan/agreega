<?php

namespace App\Http\Controllers;

use App\Person as PERSON;
use Illuminate\Http\Request;

class Teacher extends Controller
{
    public function getTeachers(){
    	$teachers = array();
    	$people = PERSON::get();
    	foreach ($people as $person) {
    		if($person->type->type == 'teacher'){
    			$teachers[] = $person;
    		}
    	}
    	return $teachers;
    }
}
