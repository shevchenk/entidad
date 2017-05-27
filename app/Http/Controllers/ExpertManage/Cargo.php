<?php
namespace App\Http\Controllers\ExpertManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExpertManage\Cargo;
use Illuminate\Support\Facades\Validator;

class Cargo extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  //Esto debe activarse cuando estemos con sessión
    }

    public function EditStatus(Request $r )
    {
        if ( $r->ajax() ) {
            Cargo::runEditStatus($r);
            $return['rst'] = 1;
            $return['msj'] = 'Registro actualizado';
            return response()->json($return);
        }
    }

    public function New(Request $r )
    {
        if ( $r->ajax() ) {
            $rules=array(
                'cargo' => 'required|max:100|unique:cargos'
            );

            $validator=Validator::make($r->all(), $rules);

            if ( !$validator->fails() ) {
                Cargo::runNew($r);
                $return['rst'] = 1;
                $return['msj'] = 'Registro creado';
            }
            else{
                $return['rst'] = 2;
                $return['msj'] = '!Cargo existente¡, modifique su cargo';
            }
            return response()->json($return);
        }
    }

    public function Edit(Request $r )
    {
        if ( $r->ajax() ) {
            $rules=array(
                'cargo' => 'required|max:100|unique:cargos,cargo,'.$r->id
            );

            $validator=Validator::make($r->all(), $rules);

            if ( !$validator->fails() ) {
                Cargo::runEdit($r);
                $return['rst'] = 1;
                $return['msj'] = 'Registro actualizado';
            }
            else{
                $return['rst'] = 2;
                $return['msj'] = '!Cargo existente¡, modifique su cargo';
            }
            return response()->json($return);
        }
    }

    public function Load(Request $r )
    {
        if ( $r->ajax() ) {
            $renturnModel = Cargo::runLoad($r);
            $return['rst'] = 1;
            $return['data'] = $renturnModel;
            $return['msj'] = "No hay registros aún";
            return response()->json($return);
        }
    }

}
