<?php
namespace App\Http\Controllers\BasicManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicManage\Persona;
use Illuminate\Support\Facades\Validator;

class PersonaBM extends Controller
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
                'dni' => 'required|max:8|unique:personas'

            );
                
                /*p $regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
            $required='required';

            nombre' => $required.'|'.$regex,
                'paterno' => $required.'|'.$regex,
                'materno' => $required.'|'.$regex,
                'email' => 'required|email|unique:personas,email',
                'password'      => 'required|min:6',
                'dni'      => 'required|numeric|min:8|unique:personas,dni',
                */
           

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
                'dni' => 'required|max:8|unique:personas,persona,'.$r->id
                
               /*
                $regex='regex:/^([a-zA-Z .,ñÑÁÉÍÓÚáéíóú]{2,60})$/i';
            $required='required';

                'nombre' => $required.'|'.$regex,
                'paterno' => $required.'|'.$regex,
                'materno' => $required.'|'.$regex,
                'email' => 'required|email|unique:personas,email,'.Input::get('id'),
                'dni'      => 'required|numeric|min:8|unique:personas,dni,'.Input::get('id'),*/
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
