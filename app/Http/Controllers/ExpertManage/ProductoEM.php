<?php
namespace App\Http\Controllers\ExpertManage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ExpertManage\Producto;
use App\Models\ExpertManage\Sucursal;
use App\Models\ExpertManage\Categoria;
use App\Models\ExpertManage\Articulo;

class ProductoEM extends Controller
{
    public function EditStatus(Request $r )
    {
        if ( $r->ajax() ) {
            Producto::runEditStatus($r);
            $return['rst'] = 1;
            $return['msj'] = 'Registro actualizado';
            return response()->json($return);
        }
    }

    public function New(Request $r )
    {
        if ( $r->ajax() ) {
            Producto::runNew($r);
            $return['rst'] = 1;
            $return['msj'] = 'Registro creado';
            return response()->json($return);
        }
    }

    public function Edit(Request $r )
    {
        if ( $r->ajax() ) {
            Producto::runEdit($r);
            $return['rst'] = 1;
            $return['msj'] = 'Registro actualizado';
            return response()->json($return);
        }
    }

    public function Load(Request $r )
    {
        if ( $r->ajax() ) {
            $renturnModel = Producto::runLoad($r);
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
    
            public function ListCategoria (Request $r )
    {
        if ( $r->ajax() ) {
            $renturnModel = Categoria::ListCategoria($r);
            $return['rst'] = 1;
            $return['data'] = $renturnModel;
            $return['msj'] = "No hay registros aún";
            return response()->json($return);
        }
    }
    
                public function ListArticulo (Request $r )
    {
        if ( $r->ajax() ) {
            $renturnModel = Articulo::ListArticulo($r);
            $return['rst'] = 1;
            $return['data'] = $renturnModel;
            $return['msj'] = "No hay registros aún";
            return response()->json($return);
        }
    }
    

}
