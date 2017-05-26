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

Route::get('/salir', function () {
    return Redirect::to('/');
});

Route::get(
    '/{ruta}', function ($ruta) {
        /*if (Session::has('accesos')) {
            $accesos = Session::get('accesos');
            $menus = Session::get('menus');*/
            $valores['valida_ruta_url'] = $ruta;
            //$valores['menus'] = $menus;
            return view($ruta)->with($valores);
        /*} else {
            return Redirect::to('/');
        }*/
    }
);
Route::post('/AjaxDinamic/{ruta}','SecureAccess\Persona@');
