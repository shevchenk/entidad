<?php

namespace App\Models\BasicManage;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected   $table = 'ventas';

    public static function runEditStatus($r)
    {
        $venta = Venta::find($r->id);
        $venta->estado = trim( $r->estadof );
        $venta->persona_id_updated_at=1;
        $venta->save();
    }

    public static function runNew($r)
    {
        $venta = new Venta;

        $venta->estado = trim( $r->estado );
        $venta->persona_id_created_at=1;
        $venta->save();
    }

    public static function runEdit($r)
    {
        $venta = Venta::find($r->id);

        $venta->estado = trim( $r->estado );
        $venta->persona_id_updated_at=1;
        $venta->save();
    }

    public static function runLoad($r)
    {
        $sql=Venta::select('id','estado')
            ->where( 
                function($query) use ($r){

                    if( $r->has("estado") ){
                        $estado=trim($r->estado);
                        if( $estado !='' ){
                            $query->where('estado','like','%'.$estado.'%');
                        }
                    }
                }
            );
        $result=$sql->orderBy('id','asc')->get();
        return $result;
    }



}
