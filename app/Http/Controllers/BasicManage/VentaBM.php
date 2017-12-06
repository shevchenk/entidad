<?php
namespace App\Http\Controllers\BasicManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BasicManage\Venta;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class VentaBM extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');  //Esto debe activarse cuando estemos con sessión
    }

    public function EditStatus(Request $r )
    {
        if ( $r->ajax() ) {
            Venta::runEditStatus($r);
            $return['rst'] = 1;
            $return['msj'] = 'Registro actualizado';
            return response()->json($return);
        }
    }

    public function New(Request $r )
    {

    }


    public function Load(Request $r )
    {
        if ( $r->ajax() ) {
            $renturnModel = Venta::runLoad($r);
            $return['rst'] = 1;
            $return['data'] = $renturnModel;
            $return['msj'] = "No hay registros aún";
            return response()->json($return);
        }
    }

    public function postFechaactual(){
        $f=date("Y-m-d");
        $h=date("H:i:s",strtotime("-1 minute"));
        return response()->json(
                array(
                    'rst'   => 1,
                    'fecha'   => $f,
                    'hora'    => $h
                )
            );
    }


}
