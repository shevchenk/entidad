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
    return view('secureaccess.login');
});

Route::get('/salir','SecureAccess\Persona@logout');

Route::get(
    '/{ruta}', function ($ruta) {
        if( session()->has('dni') && session()->has('menu') ){
            $valores['valida_ruta_url'] = $ruta;
            $valores['menu'] = session('menu');
            return view($ruta)->with($valores);
        }
        else{
            return redirect('/');
        }
    }
);

Route::post('/AjaxDinamic/{ruta}','SecureAccess\Persona@');

