<?php

namespace App\Models\ExpertManage;

use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    protected   $table = 'sucursales';

    public static function runEditStatus($r)
    {
        $sucursal = Sucursal::find($r->id);
        $sucursal->estado = trim( $r->estadof );
        $sucursal->persona_id_updated_at=1;
        $sucursal->save();
    }

    public static function runNew($r)
    {
        $sucursal = new Sucursal;
        $sucursal->sucursal = trim( $r->sucursal );
        $sucursal->estado = trim( $r->estado );
        $sucursal->persona_id_created_at=1;
        $sucursal->save();
    }

    public static function runEdit($r)
    {
        $sucursal = Sucursal::find($r->id);
        $sucursal->sucursal = trim( $r->sucursal );
        $sucursal->estado = trim( $r->estado );
        $sucursal->persona_id_updated_at=1;
        $sucursal->save();
    }

    public static function runLoad($r)
    {
        $sql=Sucursal::select('id','sucursal','estado')
            ->where( 
                function($query) use ($r){
                    if( $r->has("sucursal") ){
                        $sucursal=trim($r->sucursal);
                        if( $sucursal !='' ){
                            $query->where('sucursal','like','%'.$sucursal.'%');
                        }
                    }
                    if( $r->has("estado") ){
                        $estado=trim($r->estado);
                        if( $estado !='' ){
                            $query->where('estado','like','%'.$estado.'%');
                        }
                    }
                }
            );
        $result = $sql->orderBy('sucursal','asc')->paginate(10);
        return $result;
    }
    
        public static function ListSucursal($r)
    {
        $sql=Sucursal::select('id','sucursal','estado')
            ->where('estado','=','1');
        $result = $sql->orderBy('sucursal','asc')->get();
        return $result;
    }
    

}
