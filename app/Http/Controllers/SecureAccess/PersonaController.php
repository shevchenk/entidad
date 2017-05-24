<?php
namespace App\Http\Controllers\SecureAccess;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SecureAccess\Persona;
use DB;

class PersonaController extends Controller
{
    public function index()
    {
        return "Hola Mundo";
    }

    public function getPersona()
    {
        //dump( Persona::all() );
        echo Persona::count()."<br>";
        foreach (Persona::all() as $Persona ) {
            echo $Persona->dni."<br>";
        }
        echo "<br><hr><br>";
        foreach (TipoComprobante::all() as $TipoComprobante ) {
            echo $TipoComprobante->tipo_comprobante."<br>";
        }
    }

    public function getPaginacion()
    {
        $data=TipoComprobante::select( 'id','tipo_comprobante','sigla',DB::raw('IF(estado=1,"Activo","Inactivo") as estado') )->paginate(2);
        return view('SecureAccess.paginacion',compact('data'));
    }
}
