<?php
namespace App\Http\Controllers\ExpertManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExpertManage\Cliente;

class ClienteEM extends Controller
{
    public function EditStatus(Request $r )
    {
        if ( $r->ajax() ) {
            Cliente::runEditStatus($r);
            $return['rst'] = 1;
            $return['msj'] = 'Registro actualizado';
            return response()->json($return);
        }
    }

    public function New(Request $r )
    {
        if ( $r->ajax() ) {
            Cliente::runNew($r);
            $return['rst'] = 1;
            $return['msj'] = 'Registro creado';
            return response()->json($return);
        }
    }

    public function Edit(Request $r )
    {
        if ( $r->ajax() ) {
            Cliente::runEdit($r);
            $return['rst'] = 1;
            $return['msj'] = 'Registro actualizado';
            return response()->json($return);
        }
    }

    public function Load(Request $r )
    {
        if ( $r->ajax() ) {
            $renturnModel = Cliente::runLoad($r);
            $return['rst'] = 1;
            $return['data'] = $renturnModel;
            $return['msj'] = "No hay registros aún";
            return response()->json($return);
        }
    }

}
