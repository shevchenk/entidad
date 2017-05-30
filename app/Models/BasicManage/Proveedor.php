<?php

namespace App\Models\BasicManage;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected   $table = 'proveedores';

    public static function runEditStatus($r)
    {
        $empleado = Proveedor::find($r->id);
        $empleado->estado = trim( $r->estadof );
        $empleado->persona_id_updated_at=1;
        $empleado->save();
    }

    public static function runNew($r)
    {
        $empleado = new Proveedor;
        $empleado->persona_id = trim( $r->persona_id );
        $empleado->emresa_id = trim( $r->empresa_id );
        $empleado->estado = trim( $r->estado );
        $empleado->persona_id_created_at=1;
        $empleado->save();
    }

    public static function runEdit($r)
    {
        $empleado = Proveedor::find($r->id);
        $empleado->persona_id = trim( $r->persona_id );
        $empleado->emresa_id = trim( $r->empresa_id );
        $empleado->estado = trim( $r->estado );
        $empleado->persona_id_updated_at=1;
        $empleado->save();
    }

    public static function runLoad($r)
    {
        $sql=Proveedor::select('proveedores.id','´proveedores.persona_id','proveedores.emresa_id',
                               selectRaw('CONCAT_WS(" ",personas.paterno,personas.materno,personas.nombre '))
            ->join('personas','proveedores.persona_id','=','personas.id')
            ->join('empresas','proveedores.emresa_id','=','empresas.id')
            ->where( 
                function($query) use ($r){
                    if( $r->has("persona") ){
                        $persona=trim($r->persona);
                        if( $persona !='' ){
                            $query->whereRaw('CONCAT_WS(" ",personas.paterno,personas.materno,personas.nombre ) like "%'.$persona.'%"');
                        }
                    }
                    if( $r->has("sucursal") ){
                        $sucursal=trim($r->sucursal);
                        if( $sucursal !='' ){
                            $query->where('sucursales.sucursal','like','%'.$sucursal.'%');
                        }

                    if( $r->has("estado") ){
                        $estado=trim($r->estado);
                        if( $estado !='' ){
                            $query->where('empleados.estado','like','%'.$estado.'%');
                        }
                    }
                }
            );
        $result = $sql->orderBy('empleados.id','asc')->get();
        return $result;
    }
    
        public static function ListProveedor($r)
    {
        $sql=Proveedor::select('id','empleado','estado')
            ->where('estado','=','1');
        $result = $sql->orderBy('empleado','asc')->get();
        return $result;
    }
    

}
