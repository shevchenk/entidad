<?php

namespace App\Models\BasicManage;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use DB;

class ProveedorDetalle extends Model
{
    protected   $table = 'proveedores_detalles';

    public static function runEditStatus($r)
    {
        $proveedores_detalles = Auth::user()->id;
        $proveedordetalle = ProveedorDetalle::find($r->id);
        $proveedordetalle->estado = trim( $r->estadof );
        $proveedordetalle->persona_id_updated_at=$proveedores_detalles;
        $proveedordetalle->save();
    }

    public static function runNew($r)
    {
        $proveedores_detalles = Auth::user()->id;
        $proveedordetalle = new ProveedorDetalle;
        $proveedordetalle->proveedor_id = trim( $r->proveedor_id );
        $proveedordetalle->categoria_id = trim( $r->categoria_id );
        $proveedordetalle->articulo_id = trim( $r->articulo_id );
        
        $proveedordetalle->estado = trim( $r->estado );
        $proveedordetalle->persona_id_created_at=$proveedores_detalles;
        $proveedordetalle->save();
    }

    public static function runEdit($r)
    {
        $proveedores_detalles = Auth::user()->id;
        $proveedordetalle = ProveedorDetalle::find($r->id);
        $proveedordetalle->persona_id = trim( $r->persona_id );
        $proveedordetalle->categoria_id = trim( $r->categoria_id );
        $proveedordetalle->articulo_id = trim( $r->articulo_id );
        
        $proveedordetalle->estado = trim( $r->estado );
        $proveedordetalle->persona_id_updated_at=$proveedores_detalles;
        
        $proveedordetalle->save();
    }

    public static function runLoad($r)
    {
        $sql=ProveedorDetalle::select('proveedores_detalles.id',
                'personas.nombre','personas.paterno','personas.materno',
                'categorias.categoria',
                'articulos.articulo')
             ->join('proveedores','proveedores.id','=','proveedores_detalles.proveedor_id')
             ->join('personas','personas.id','=','proveedores.persona_id')
             ->leftjoin('categorias','categorias.id','=','proveedores_detalles.categoria_id')
             ->leftjoin('articulos','articulos.id','=','proveedores_detalles.articulo_id')

             ->where( 
                function($query) use ($r){
                     
                 
                     $query->where('proveedores_detalles.proveedor_id','=',$r->id);
                     
                    if( $r->has("persona") ){
                        $persona=trim($r->persona);
                        if( $persona !='' ){
                            $query->whereRaw('CONCAT_WS(" ",personas.paterno,personas.materno,personas.nombre ) like "%'.$persona.'%"');
                        }
                    }
                    if( $r->has("categoria") ){
                        $categoria=trim($r->categoria);
                        if( $categoria !='' ){
                            $query->where('proveedores_detalles.categoria','like','%'.categoria.'%');
                        }
                    }
                    
                    if( $r->has("articulo") ){
                        $articulo=trim($r->articulo);
                        if( $articulo !='' ){
                            $query->where('proveedores_detalles.articulo','like','%'.articulo.'%');
                        }
                    }
                    
                    if( $r->has("estado") ){
                        $estado=trim($r->estado);
                        if( $estado !='' ){
                            $query->where('proveedores_detalles.estado','like','%'.$estado.'%');
                        }
                    }
                }
            );
        $result = $sql->orderBy('id','asc')->get();
        return $result;
    }

    
 /*,DB::row('CONCAT_WS(" " ,"per.nombre,"per.paterno","per.materno")'), 'emp.razon_social','cat.categoria'*/
}
