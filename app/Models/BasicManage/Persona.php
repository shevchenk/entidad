<?php

namespace App\Models\BasicManage;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected   $table = 'personas';

    public static function runEditStatus($r)
    {
        $persona = Persona::find($r->id);
        $persona->estado = trim( $r->estadof );
        $persona->persona_id_updated_at=1;
        $persona->save();
    }

    public static function runNew($r)
    {
        $persona = new Persona;
        $persona->paterno = trim( $r->paterno );
        $persona->materno = trim( $r->materno );
        $persona->nombre = trim( $r->nombre );
        $persona->dni = trim( $r->dni );
        $persona->sexo = trim( $r->sexo );
        $persona->email = trim( $r->email );
        $persona->password = trim( $r->password );
        $persona->telefono = trim( $r->telefono );
        $persona->celular = trim( $r->celular );
       /* if (trim($r->fecha_nacimiento)<>'') */
        //$persona->fecha_nacimiento = trim( $r->fecha_nacimiento );
        $persona->estado = trim( $r->estado );
        $persona->persona_id_created_at=1;
        $persona->save();
    }

    public static function runEdit($r)
    {
        $persona = Persona::find($r->id);
        $persona->paterno = trim( $r->paterno );
        $persona->materno = trim( $r->materno );
        $persona->nombre = trim( $r->nombre );
        $persona->dni = trim( $r->dni );
        $persona->sexo = trim( $r->sexo );
        $persona->email = trim( $r->email );
        $persona->password = trim( $r->password );
        $persona->telefono = trim( $r->telefono );
        $persona->celular = trim( $r->celular );
       /*if (trim($r->fecha_nacimiento)<>'') */
        //$persona->fecha_nacimiento = trim( $r->fecha_nacimiento );
        $persona->estado = trim( $r->estado );
        $persona->persona_id_updated_at=1;
        $persona->save();
    }

    public static function runLoad($r)
    {
        $sql=Persona::select('id','paterno','materno','nombre','dni','estado')
            ->where( 
                function($query) use ($r){
                    if( $r->has("paterno") ){
                        $paterno=trim($r->paterno);
                        if( $paterno !='' ){
                            $query->where('paterno','like','%'.$paterno.'%');
                        }
                    }
                    if( $r->has("materno") ){
                        $materno=trim($r->materno);
                        if( $materno !='' ){
                            $query->where('materno','like','%'.$materno.'%');
                        }
                    }
                    if( $r->has("nombre") ){
                        $nombre=trim($r->nombre);
                        if( $nombre !='' ){
                            $query->where('nombre','like','%'.$nombre.'%');
                        }
                    }
                    if( $r->has("dni") ){
                        $dni=trim($r->dni);
                        if( $dni !='' ){
                            $query->where('dni','like','%'.$dni.'%');
                        }
                    }
                    if( $r->has("email") ){
                        $email=trim($r->email);
                        if( $email !='' ){
                            $query->where('email','like','%'.$email.'%');
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
        $result = $sql->orderBy('paterno','asc')->get();
        return $result;
    }
}
