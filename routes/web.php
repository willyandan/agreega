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
        Route::post('atualizar', 'School@update')->name('update');
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
    	Route::get('/','Student@index')->name('index');
        Route::get('view/{id}','Student@view')->name('view');
        //CADASTRAR ALUNO
    	Route::get('cadastrar','Student@create')->name('create');
    	Route::post('salvar','Student@save')->name('save');

        //EDITAR ALUNO
    	Route::get('editar/{id}','Student@edit')->name('edit');
    	Route::post('atualizar','Student@update')->name('update');

        //DELETAR ALUNO
        Route::delete('deletar','Student@delete')->name('delete');
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
    Route::post('verificaEmail', 'Person@verifyEmail')->name('verifyEmail');
    Route::post('verificaLogin', 'Person@verifyLogin')->name('verifyLogin');
    Route::post('verificaRa', 'Person@verifyRa')->name('verifyRa');
});
