<?php
namespace App\Http\Controllers\BasicManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicManage\Sucursal;
use Illuminate\Support\Facades\Validator;

class SucursalBM extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  //Esto debe activarse cuando estemos con sessión
    }

    public function EditStatus(Request $r )
    {
        if ( $r->ajax() ) {
            Sucursal::runEditStatus($r);
            $return['rst'] = 1;
            $return['msj'] = 'Registro actualizado';
            return response()->json($return);
        }
    }

    public function New(Request $r )
    {
        if ( $r->ajax() ) {
            $rules=array(
                'sucursal' => 'required|max:100|unique:sucursales'
            );

            $validator=Validator::make($r->all(), $rules);

            if ( !$validator->fails() ) {
                Sucursal::runNew($r);
                $return['rst'] = 1;
                $return['msj'] = 'Registro creado';
            }
            else{
                $return['rst'] = 2;
                $return['msj'] = '!Sucursal existente¡, modifique su sucursal';
            }
            return response()->json($return);
        }
    }

    public function Edit(Request $r )
    {
        if ( $r->ajax() ) {
            $rules=array(
                'sucursal' => 'required|max:100|unique:sucursales,sucursal,'.$r->id
            );

            $validator=Validator::make($r->all(), $rules);

            if ( !$validator->fails() ) {
                Sucursal::runEdit($r);
                $return['rst'] = 1;
                $return['msj'] = 'Registro actualizado';
            }
            else{
                $return['rst'] = 2;
                $return['msj'] = '!Sucursal existente¡, modifique su sucursal';
            }
            return response()->json($return);
        }
    }

    public function Load(Request $r )
    {
        if ( $r->ajax() ) {
            $renturnModel = Sucursal::runLoad($r);
            $return['rst'] = 1;
            $return['data'] = $renturnModel;
            $return['msj'] = "No hay registros aún";
            return response()->json($return);
        }
    }
    
        public function ListSucursal (Request $r )
    {
        if ( $r->ajax() ) {
            $renturnModel = Sucursal::ListSucursal($r);
            $return['rst'] = 1;
            $return['data'] = $renturnModel;
            $return['msj'] = "No hay registros aún";
            return response()->json($return);
        }
    }

}
