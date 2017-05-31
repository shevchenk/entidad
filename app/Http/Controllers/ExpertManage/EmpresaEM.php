<?php
namespace App\Http\Controllers\ExpertManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExpertManage\Empresa;
use Illuminate\Support\Facades\Validator;

class EmpresaEM extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  //Esto debe activarse cuando estemos con sessión
    }


    public function EditStatus(Request $r )
    {
        if ( $r->ajax() ) {
            Empresa::runEditStatus($r);
            $return['rst'] = 1;
            $return['msj'] = 'Registro actualizado';
            return response()->json($return);
        }
    }

    public function New(Request $r )
    {
        if ( $r->ajax() ) {
            $rules=array(
                'ruc' => 'required|max:11|unique:empresas,ruc,'
            );

            $validator=Validator::make($r->all(), $rules);

            if ( !$validator->fails() ) {
                Empresa::runNew($r);
                $return['rst'] = 1;
                $return['msj'] = 'Registro creado';
            }
            else{
                $return['rst'] = 2;
                $return['msj'] = '!Empresa existente¡, modifique su empresa';
            }
            return response()->json($return);
        }
    }

    public function Edit(Request $r )
    {
        if ( $r->ajax() ) {
            $rules=array(
                'ruc' => 'required|max:11|unique:empresas,ruc,'.$r->id
            );

            $validator=Validator::make($r->all(), $rules);

            if ( !$validator->fails() ) {
                Empresa::runEdit($r);
                $return['rst'] = 1;
                $return['msj'] = 'Registro actualizado';
            }
            else{
                $return['rst'] = 2;
                $return['msj'] = '!Empresa existente¡, modifique su empresas';
            }
            return response()->json($return);
        }
    }

    public function Load(Request $r )
    {
        if ( $r->ajax() ) {
            $renturnModel = Empresa::runLoad($r);
            $return['rst'] = 1;
            $return['data'] = $renturnModel;
            $return['msj'] = "No hay registros aún";
            return response()->json($return);
        }
    }

}
