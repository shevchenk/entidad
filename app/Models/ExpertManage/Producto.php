<?php

namespace App\Models\ExpertManage;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected   $table = 'productos';

    public static function runEditStatus($r)
    {
        $producto = Producto::find($r->id);
        $producto->estado = trim( $r->estadof );
        $producto->persona_id_updated_at=1;
        $producto->save();
    }

    public static function runNew($r)
    {        
        $producto = new Producto;
        $producto->producto = trim( $r->producto );
        $producto->sucursal_id = trim( $r->sucursal );
        $producto->articulo_id = trim( $r->articulo );
        $producto->precio_venta = trim( $r->precio_venta );
        $producto->precio_compra = trim( $r->precio_compra );
        $producto->moneda = trim( $r->moneda );
        $producto->stock = trim( $r->stock );
        $producto->stock_minimo = trim( $r->stock_minimo );
        $producto->dias_alerta = trim( $r->dias_alerta );
        $producto->fecha_vencimiento = trim( $r->fecha_vencimiento );
        $producto->dias_vencimiento = trim( $r->dias_vencimiento );
        $producto->estado = trim( $r->estado );
        $producto->persona_id_created_at=1;
        $producto->save();
        
//        $file = $r->pago_archivo;
//        $nombre=$r->pago_nombre;
//        $url = "img/product/".$nombre;
//        $this->fileToFile($file, $url);
                
    }

    public static function runEdit($r)
    {
        $producto = Producto::find($r->id);
        $producto->producto = trim( $r->producto );
        $producto->sucursal_id = trim( $r->sucursal );
        $producto->articulo_id = trim( $r->articulo );
        $producto->precio_venta = trim( $r->precio_venta );
        $producto->precio_compra = trim( $r->precio_compra );
        $producto->moneda = trim( $r->moneda );
        $producto->stock = trim( $r->stock );
        $producto->stock_minimo = trim( $r->stock_minimo );
        $producto->dias_alerta = trim( $r->dias_alerta );
        $producto->fecha_vencimiento = trim( $r->fecha_vencimiento );
        $producto->dias_vencimiento = trim( $r->dias_vencimiento );
        $producto->estado = trim( $r->estado );
        $producto->persona_id_updated_at=1;
        $producto->save();
    }

    public static function runLoad($r)
    {
        $sql=Producto::select('id','articulo_id','sucursal_id','producto','precio_venta','precio_compra',
                'moneda','stock','stock_minimo','dias_alerta','fecha_vencimiento','dias_vencimiento','estado')
            ->where( 
                function($query) use ($r){
                    if( $r->has("producto") ){
                        $producto=trim($r->producto);
                        if( $producto !='' ){
                            $query->where('producto','like','%'.$producto.'%');
                        }
                    }
                    if( $r->has("estado") ){
                        $estado=trim($r->estado);
                        if( $estado !='' ){
                            $query->where('estado','like','%'.$estado.'%');
                        }
                    }
                    if( $r->has("precio_venta") ){
                        $precio_venta=trim($r->precio_venta);
                        if( $precio_venta !='' ){
                            $query->where('precio_venta','like','%'.$precio_venta.'%');
                        }
                    }
                    if( $r->has("precio_compra") ){
                        $precio_compra=trim($r->precio_compra);
                        if( $precio_compra !='' ){
                            $query->where('precio_compra','like','%'.$precio_compra.'%');
                        }
                    }
                }
            );
        $result = $sql->orderBy('producto','asc')->paginate(10);
        return $result;
    }
    
    
        public function fileToFile($file, $url)
    {
        if ( !is_dir('img') ) {
            mkdir('img',0777);
        }
        if ( !is_dir('img/product') ) {
            mkdir('img/product',0777);
        }

        list($type, $file) = explode(';', $file);
        list(, $type) = explode('/', $type);
        if ($type=='jpeg') $type='jpg';
        if (strpos($type,'document')!==False) $type='docx';
        if (strpos($type, 'sheet') !== False) $type='xlsx';
        if (strpos($type, 'pdf') !== False) $type='pdf';
        if ($type=='plain') $type='txt';
        list(, $file)      = explode(',', $file);
        $file = base64_decode($file);
        file_put_contents($url , $file);
        return $url. $type;
    }

}
