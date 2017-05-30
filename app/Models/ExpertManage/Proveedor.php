<?php

namespace App\Models\ExpertManage;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected   $table = 'proveedores';

    public static function runEditStatus($r)
    {
        $proveedor = Proveedor::find($r->id);
        $proveedor->estado = trim( $r->estadof );
        $proveedor->persona_id_updated_at=1;
        $proveedor->save();
    }

    public static function runNew($r)
    {
        $proveedor = new Proveedor;
        $proveedor->persona_id = trim( $r->persona_id );
        if(trim( $r->empresa_id )!=''){
        $proveedor->emresa_id = trim( $r->empresa_id );}
        $proveedor->estado = trim( $r->estado );
        $proveedor->persona_id_created_at=1;
        $proveedor->save();
    }

    public static function runEdit($r)
    {
        $proveedor = Proveedor::find($r->id);
        $proveedor->persona_id = trim( $r->persona_id );
        if(trim( $r->empresa_id )!=''){
        $proveedor->emresa_id = trim( $r->empresa_id );}
        $proveedor->estado = trim( $r->estado );
        $proveedor->persona_id_updated_at=1;
        $proveedor->save();
    }

    public static function runLoad($r)
    {
        $sql=Proveedor::select('proveedores.id','proveedores.persona_id','personas.paterno','personas.materno','personas.nombre',
                               'proveedores.emresa_id','empresas.razon_social','proveedores.estado')
            ->join('personas','proveedores.persona_id','=','personas.id')
            ->leftjoin('empresas','proveedores.emresa_id','=','empresas.id')
            ->where( 
                function($query) use ($r){
                    if( $r->has("persona") ){
                        $persona=trim($r->persona);
                        if( $persona !='' ){
                            $query->whereRaw('CONCAT_WS(" ",personas.paterno,personas.materno,personas.nombre ) like "%'.$persona.'%"');
                        }
                    }
                    if( $r->has("empresa") ){
                        $empresa=trim($r->empresa);
                        if( $empresa !='' ){
                            $query->where('empresas.razon_social','like','%'.$empresa.'%');
                        }
                    }
                    if( $r->has("estado") ){
                        $estado=trim($r->estado);
                        if( $estado !='' ){
                            $query->where('proveedores.estado','like','%'.$estado.'%');
                        }
                    }
                }
            );
        $result = $sql->orderBy('proveedores.id','asc')->paginate(10);
        return $result;
    }
  

}
