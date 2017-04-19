<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Closure;

class AdminAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //VERIFICAR SE EXISTA COORDENADOR E ESCOLA
        $name = Route::currentRouteName();
        if($name != "admin.index"){
            if(!$request->session()->has('admin') || !$request->session()->has('escola')){
                return redirect()->route('admin.index');   
            }
        }
        return $next($request);
    }
}
