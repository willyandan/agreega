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
    
    //PROFESSORES
    Route::group(['prefix' => 'professor', 'as' => 'professor'], function() {
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
    Route::group(['prefix' => 'aluno', 'as' => 'aluno'], function() {
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

    //MATERIAS
    Route::group(['prefix' => 'materia', 'as' => 'materia'], function() {
        //LISTA DE MATERIA
    	Route::get('/', function() {
    	    
    	});

        //CADASTRAR MATERIA
    	Route::get('cadastrar', function() {
    	    //
    	});
    	Route::post('salvar', function() {
    	    //
    	});

        //EDITAR MATERIA
    	Route::get('editar/{id}', function() {
    	    //
    	});
    	Route::post('atualizar', function() {
    	    //
    	});
    	
        //DELETAR MATERIA
        Route::delete('deletar', function() {
            //
        });
    });

    //CLASSES
    Route::group(['prefix' => 'classe', 'as' => 'classe'], function() {
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

    //HORARIOS
    Route::group(['prefix' => 'horario', 'as' => 'horario'], function() {
        //LISTA DE HORARIO
    	Route::get('/', function() {
    	    
    	});

        //CADASTRAR HORARIO
    	Route::get('cadastrar', function() {
    	    //
    	});
    	Route::post('salvar', function() {
    	    //
    	});

        //EDITAR HORARIO
    	Route::get('editar/{id}', function() {
    	    //
    	});
    	Route::post('atualizar', function() {
    	    //
    	});
    	
        //DELETAR HORARIO
        Route::delete('deletar', function() {
            //
        });
    });
});
