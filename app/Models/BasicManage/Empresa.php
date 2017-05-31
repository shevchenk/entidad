<?php

namespace App\Models\BasicManage;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected   $table = 'empresas';

    public static function runEditStatus($r)
    {
        $empresa = Empresa::find($r->id);
        $empresa->estado = trim( $r->estadof );
        $empresa->persona_id_updated_at=1;
        $empresa->save();
    }

    public static function runNew($r)
    {
        $empresa = new Empresa;
        $empresa->persona_id = trim( $r->persona_id );
        $empresa->entidad = trim( $r->entidad );
        $empresa->ruc = trim( $r->ruc );
        $empresa->nombre_comercial = trim( $r->nombre_comercial );
        $empresa->direccion_fiscal = trim( $r->direccion_fiscal );
        $empresa->telefono = trim( $r->telefono );
        $empresa->celular = trim( $r->celular );
        $empresa->email = trim( $r->email );
        $empresa->estado = trim( $r->estado );
        $empresa->persona_id_created_at=1;
        $empresa->save();
    }

    public static function runEdit($r)
    {
        $empresa = Empresa::find($r->id);
        $empresa->persona_id = trim( $r->persona_id );
        $empresa->entidad = trim( $r->entidad );
        $empresa->ruc = trim( $r->ruc );
        $empresa->nombre_comercial = trim( $r->nombre_comercial );
        $empresa->direccion_fiscal = trim( $r->direccion_fiscal );
        $empresa->telefono = trim( $r->telefono );
        $empresa->celular = trim( $r->celular );
        $empresa->email = trim( $r->email );
        $empresa->estado = trim( $r->estado );
        $empresa->persona_id_updated_at=1;
        $empresa->save();
    }

    public static function runLoad($r)
    {
        $sql=Empresa::select('empresas.id','empresas.persona_id','empresas.ruc','empresas.razon_social','empresas.nombre_comercial',
                             'empresas.direccion_fiscal','empresas.telefono','empresas.celular','empresas.email',
                            'empresas.estado','personas.paterno','personas.materno','personas.nombre')
             ->join('personas','empresas.persona_id','=','personas.id')
             ->where( 
                function($query) use ($r){
                    if( $r->has("empresa") ){
                        $empresa=trim($r->empresa);
                        if( $empresa !='' ){
                            $query->where('empresa','like','%'.$empresa.'%');
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
        $result = $sql->orderBy('persona_id','asc')->get();
        return $result;
    }

 
}
