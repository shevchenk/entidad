<?php

namespace App\Models\ExpertManage;

use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    protected   $table = 'empleados';

    public static function runEditStatus($r)
    {
        $empleado = Empleado::find($r->id);
        $empleado->estado = trim( $r->estadof );
        $empleado->persona_id_updated_at=1;
        $empleado->save();
    }

    public static function runNew($r)
    {
        $empleado = new Empleado;
        $empleado->persona_id = trim( $r->persona );
        $empleado->cargo_id = trim( $r->cargo );
        $empleado->sucursal_id = trim( $r->sucursal );
        $empleado->fecha_inicio = trim( $r->fecha_inicio );
        $empleado->fecha_final = trim( $r->fecha_final );
        $empleado->estado = trim( $r->estado );
        $empleado->persona_id_created_at=1;
        $empleado->save();
    }

    public static function runEdit($r)
    {
        $empleado = Empleado::find($r->id);
        $empleado->persona_id = trim( $r->persona );
        $empleado->cargo_id = trim( $r->cargo );
        $empleado->sucursal_id = trim( $r->sucursal );
        $empleado->fecha_inicio = trim( $r->fecha_inicio );
        $empleado->fecha_final = trim( $r->fecha_final );
        $empleado->estado = trim( $r->estado );
        $empleado->persona_id_updated_at=1;
        $empleado->save();
    }

    public static function runLoad($r)
    {
        $sql=Empleado::select('empleados.id','persona_id','personas.paterno','personas.materno','personas.nombre','cargo_id','sucursal_id',
                             'cargos.cargo','sucursales.sucursal','empleados.estado','fecha_inicio','fecha_final')
            ->join('personas','empleados.persona_id','=','personas.id')
            ->join('cargos','empleados.cargo_id','=','cargos.id')
            ->join('sucursales','empleados.sucursal_id','=','sucursales.id')
            ->where( 
                function($query) use ($r){
                    if( $r->has("empleado") ){
                        $empleado=trim($r->empleado);
                        if( $empleado !='' ){
                            $query->where('empleado','like','%'.$empleado.'%');
                        }
                    }
                    if( $r->has("categoria") ){
                        $paterno=trim($r->categoria);
                        if( $paterno !='' ){
                            $query->where('personas.p.paterno','like','%'.$paterno.'%');
                        }
                    }
                    if( $r->has("estado") ){
                        $estado=trim($r->estado);
                        if( $estado !='' ){
                            $query->where('empleados.estado','like','%'.$estado.'%');
                        }
                    }
                }
            );
        $result = $sql->orderBy('empleados.id','asc')->paginate(10);
        return $result;
    }
    
        public static function ListEmpleado($r)
    {
        $sql=Empleado::select('id','empleado','estado')
            ->where('estado','=','1');
        $result = $sql->orderBy('empleado','asc')->get();
        return $result;
    }
    

}
