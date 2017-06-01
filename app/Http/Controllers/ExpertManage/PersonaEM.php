<?php
namespace App\Http\Controllers\ExpertManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExpertManage\Persona;
use Illuminate\Support\Facades\Validator;



class PersonaEM extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  //Esto debe activarse cuando estemos con sessión
    }

    public function EditStatus(Request $r )
    {
        if ( $r->ajax() ) {
            Persona::runEditStatus($r);
            $return['rst'] = 1;
            $return['msj'] = 'Registro actualizado';
            return response()->json($return);
        }
    }

    public function New(Request $r )
    {
        if ( $r->ajax() ) {
           
            $rules=array(
             //   'dni' => 'required|numeric|min:8|unique:personas,dni',
               'password'      => 'required|min:6',
//                'email' => 'required|email|unique:personas,email',

            );
                
            $validator=Validator::make($r->all(), $rules);

            if ( !$validator->fails() ) {
                Persona::runNew($r);
                $return['rst'] = 1;
                $return['msj'] = 'Registro creado';
            }
            else{
                $return['rst'] = 2;
                $return['msj'] = '!Persona existente¡, modifique su persona';
            }

            
            return response()->json($return);
        }
    }

    public function Edit(Request $r )
    {
        if ( $r->ajax() ) {
            
            $rules=array(
               // 'dni' => 'required|numeric|min:8|unique:personas,dni,'.$r->id,
//                'email' => 'required|email|unique:personas,email,'.$r->id,
           
            );

            $validator=Validator::make($r->all(), $rules);

            if ( !$validator->fails() ) {
                Persona::runEdit($r);
                $return['rst'] = 1;
                $return['msj'] = 'Registro actualizado';
            }
            else{
                $return['rst'] = 2;
                $return['msj'] = '!Persona existente¡, modifique su persona';
            }

            return response()->json($return);
        }
    }

    public function Load(Request $r )
    {
        if ( $r->ajax() ) {
            $renturnModel = Persona::runLoad($r);
            $return['rst'] = 1;
            $return['data'] = $renturnModel;
            $return['msj'] = "No hay registros aún";
            return response()->json($return);
        }
    }

}
