<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'admin.auth'], function() {
	
    //LOGIN OU MENU
    Route::get('/', 'Admin@index')->name('index');
    Route::post('login', 'Admin@login')->name('login');
    Route::get('logout', 'Admin@logout')->name('logout');
    
    //ESCOLA
    Route::group(['prefix' => 'escola', 'as' => 'escola.'], function(){
        Route::get('/', 'School@register')->name('register');
    });
    //PROFESSORES
    Route::group(['prefix' => 'professor', 'as' => 'professor.'], function() {
        //LISTA DE PROFESSORES
        Route::get('/', function() {
	        
	    });

	    //EDITAR PROFESSOR 
	    Route::get('editar/{id}', function() {
	        
	    });
	    Route::post('atualizar', function() {
	        
	    });

	    //CADASTRAR
	    Route::get('cadastrar', function() {
	        
	    });
	    Route::post('salvar', function() {
	        
	    });

	    //DELETAR
	    Route::delete('deletar', function() {
	        
	    });
    });

    //ALUNOS
    Route::group(['prefix' => 'aluno', 'as' => 'aluno.'], function() {
        //LISTA DE ALUNOS
    	Route::get('/', function() {
    	    
    	});

        //CADASTRAR ALUNO
    	Route::get('cadastrar', function() {
    	    //
    	});
    	Route::post('salvar', function() {
    	    //
    	});

        //EDITAR ALUNO
    	Route::get('editar/{id}', function() {
    	    //
    	});
    	Route::post('atualizar', function() {
    	    //
    	});

        //DELETAR ALUNO
        Route::delete('deletar', function() {
            //
        });
    });

    //CLASSES
    Route::group(['prefix' => 'classe', 'as' => 'classe.'], function() {
        //LISTA DE CLASSE
    	Route::get('/', function() {
    	    
    	});

        //CADASTRAR CLASSE
    	Route::get('cadastrar', function() {
    	    //
    	});
    	Route::post('salvar', function() {
    	    //
    	});

        //EDITAR CLASSE
    	Route::get('editar/{id}', function() {
    	    //
    	});
    	Route::post('atualizar', function() {
    	    //
    	});
    	
        //DELETAR CLASSE
        Route::delete('deletar', function() {
            //
        });
    });
});

Route::group(['prefix' => 'ajax', 'as' => 'ajax.'], function(){
    Route::post('cities', 'City@getCities')->name('cities');
    Route::get('states', 'City@getStates')->name('states');
    Route::post('teachers', 'Teacher@getTeachers')->name('teacher');
});
