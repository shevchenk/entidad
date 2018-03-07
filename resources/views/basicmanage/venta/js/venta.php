<script type="text/javascript">
var AddEdit=0; //0: Editar | 1: Agregar
var fechaTG='';
var horaTG='';
var TiempoFinalTG='';
var PrecioTotalG=0;
var TotalG=0;
var SubTotalG=0;
var IGVG = 1.18; // LOS PRODUCTOS YA INCLUYEN CON EL IGV
var VentaG={
        id:0,
        cliente_id:0,
        cliente:"",
        categoria_id:"",
        articulo_id:"",
        proforma_id:0,
        fecha_venta:"",
        dscto_monto:"",
        subtotal:"",
        igv_monto:"",
        igv:"",
        total:"",
        moneda:0,
        estado:1
        }; // Datos Globales
        
$(document).ready(function() {
     CargarSlct(1);
    AjaxVenta.FechaActual(hora);
    /*var responsable='<?php echo Auth::user()->paterno .' '. Auth::user()->materno .' '. Auth::user()->nombre ?>';
    var responsable_id='<?php echo Auth::user()->id ?>';
    var hoy='<?php echo date('Y-m-d H:i:s') ?>';
    $("#ModalVentaForm #txt_responsable").val(responsable);
    $("#ModalVentaForm #txt_responsable_id").val(responsable_id);
    $("#ModalVentaForm #txt_fecha").val(hoy);*/

    $("#TableVenta").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
    AjaxVenta.Cargar(HTMLCargarVenta);

    $('#ModalVenta').on('shown.bs.modal', function (event) {
        if( AddEdit==1 ){
            $(this).find('.modal-footer .btn-primary').text('Guardar').attr('onClick','AgregarEditarAjax();');
        }
        else{
            $(this).find('.modal-footer .btn-primary').text('Actualizar').attr('onClick','AgregarEditarAjax();');
            $("#ModalVentaForm").append("<input type='hidden' value='"+VentaG.id+"' name='id'>");
        }
        $('#ModalVentaForm #txt_cliente').val( VentaG.cliente );
        $('#ModalVentaForm #txt_cliente_id').val( VentaG.cliente_id );
       // $('#ModalVentaForm #slct_categoria').val( VentaG.categoria_id );
        $('#ModalVentaForm #slct_proforma').val( VentaG.proforma_id );
        $('#ModalVentaForm #txt_fecha_venta').val( VentaG.fecha_venta );
        $('#ModalVentaForm #txt_dscto_monto').val( VentaG.dscto_monto );
        $('#ModalVentaForm #txt_subtotal').val( VentaG.subtotal );
        $('#ModalVentaForm #txt_igv_monto').val( VentaG.igv_monto );
        $('#ModalVentaForm #txt_igv').val( VentaG.igv );
        $('#ModalVentaForm #txt_total').val( VentaG.total );
        $('#ModalVentaForm #slct_moneda').val( VentaG.moneda );
  
        $('#ModalVentaForm #slct_estado').val( VentaG.estado );
        $("#ModalVentaForm .selectpicker").selectpicker('refresh');
        //$('#ModalVentaForm #txt_cargo').focus();
    });

    $('#ModalVenta').on('hidden.bs.modal', function (event) {
        $("#ModalVentaForm input[type='hidden']").not('.mant').remove();
    });

    $( "#ModalVentaForm #slct_categoria_id" ).change(function() {
            var categoria_id= $('#ModalVentaForm #slct_categoria_id').val();
            AjaxVenta.CargarArticulo(SlctCargarArticulo,categoria_id);
    });

    $( "#ModalVentaForm #slct_articulo_id" ).change(function() {
            var articulo_id= $('#ModalVentaForm #slct_articulo_id').val();
            AjaxListaproducto.CargarProducto(HtmlCargarProducto,articulo_id);
    });
});


ValidaForm=function(){
    var r=true;
    if( $.trim( $("#ModalVentaForm #txt_cliente").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Seleccione Cliente',4000);
    }
    else if( $.trim( $("#ModalVentaForm #slct_categoria").val() )=='0' ){
        r=false;
        msjG.mensaje('warning','Seleccione Sucursal',4000);
    }
    // else if( $.trim( $("#ModalVentaForm #slct_proforma").val() )=='0' ){
    //     r=false;
    //     msjG.mensaje('warning','Seleccione Proforma',4000);
    // }
    else if( $.trim( $("#ModalVentaForm #txt_fecha_vencimiento").val() )==''){
        r=false;
        msjG.mensaje('warning','Ingrese Fecha',4000);
    }
    return r;
}



AgregarEditar=function(val,id){
    AddEdit=val;
    VentaG.id='';
    VentaG.cliente='';
    VentaG.cliente_id='0';
   // VentaG.categoria_id='0';
    VentaG.proforma_id='0';
    VentaG.fecha_venta='';
    VentaG.dscto_monto='';
    VentaG.subtotal='';
    VentaG.igv_monto='';
    VentaG.igv='';
    VentaG.total='';
    VentaG.moneda='0';
    VentaG.estado='1';
    if( val==0 ){
        VentaG.id=id;
        VentaG.cliente=$("#TableVenta #trid_"+id+" .cliente").text();
        VentaG.cliente_id=$("#TableVenta #trid_"+id+" .cliente_id").val();
       // VentaG.categoria_id=$("#TableVenta #trid_"+id+" .categoria_id").val();
        VentaG.proforma_id=$("#TableVenta #trid_"+id+" .proforma_id").val();
        VentaG.fecha_venta=$("#TableVenta #trid_"+id+" .fecha_venta").val();
        VentaG.dscto_monto=$("#TableVenta #trid_"+id+" .dscto_monto").text();
        VentaG.subtotal=$("#TableVenta #trid_"+id+" .subtotal").text();
        VentaG.igv_monto=$("#TableVenta #trid_"+id+" .igv_monto").text();
        VentaG.igv=$("#TableVenta #trid_"+id+" .igv").text();
        VentaG.total=$("#TableVenta #trid_"+id+" .total").text();
        VentaG.moneda=$("#TableVenta #trid_"+id+" .moneda").val();
        VentaG.estado=$("#TableVenta #trid_"+id+" .estado").val();
    }
    $('#ModalVenta').modal('show');
}

CambiarEstado=function(estado,id){
    AjaxVenta.CambiarEstado(HTMLCambiarEstado,estado,id);
}

HTMLCambiarEstado=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        AjaxVenta.Cargar(HTMLCargarVenta);
    }
}

AgregarEditarAjax=function(){
    if( ValidaForm() ){
        AjaxVenta.AgregarEditar(HTMLAgregarEditar);
    }
}




HTMLAgregarEditar=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        $('#ModalVenta').modal('hide');
        AjaxVenta.Cargar(HTMLCargarVenta);
    }else{
        msjG.mensaje('warning',result.msj,3000);
    }
}



HTMLCargarVenta=function(result){
    var html="";
    $('#TableVenta').DataTable().destroy();

    $.each(result.data,function(index,r){
        estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(1,'+r.id+')" class="btn btn-danger">Inactivo</span>';
        if(r.estado==1){
            estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(0,'+r.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr id='trid_"+r.id+"'>"+
            "<td class='cliente'>"+r.cliente+"</td>"+
            //"<td class='categoria'>"+r.categoria+"</td>"+
            "<td class='precio_venta'>"+r.precio_venta+"</td>"+
            "<td>"+
            "<input type='hidden' class='cliente_id' value='"+r.cliente_id+"'>"+
           // "<input type='hidden' class='categoria_id' value='"+r.categoria_id+"'>"+
            "<input type='hidden' class='proforma_id' value='"+r.proforma_id+"'>"+
            "<input type='hidden' class='moneda' value='"+r.moneda+"'>"+
          
            "<input type='hidden' class='fecha_venta' value='"+r.fecha_venta+"'>"+
 
            "<td><input type='hidden' class='estado' value='"+r.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" onClick="AgregarEditar(0,'+r.id+')"><i class="fa fa-edit fa-lg"></i> </a></td>';
        html+="</tr>";
    });
    $("#TableVenta tbody").html(html); 
    $("#TableVenta").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
};

hora=function(){

    tiempo=horaTG.split(":");
    tiempo[1]=tiempo[1]*1+1;
    if(tiempo[1]*1==60){
        tiempo[0]=tiempo[0]*1+1;
        tiempo[1]='0';
    }

    if(tiempo[0]*1<10){
    tiempo[0] = "0" + tiempo[0]*1;
    }

    if(tiempo[1]*1<10){
    tiempo[1] = "0" + tiempo[1]*1;
    }
    
    

    horaTG=tiempo.join(":");
    $("#txt_fecha_inicio").val(fechaTG+" "+horaTG);
    TiempoFinalTG = setTimeout('hora()',9000);
};


CargarSlct=function(slct){
    if(slct==1){
        
        AjaxVenta.CargarCategoria(SlctCargarCategoria);

    }
};

SlctCargarCategoria=function(result){
    var html="<option value='0'>.::Seleccione::.</option>";
    $.each(result.data,function(index,r){
        html+="<option value="+r.id+">"+r.categoria+"</option>";
    });
    $("#ModalVentaForm #slct_categoria_id").html(html); 
    $("#ModalVentaForm #slct_categoria_id").selectpicker('refresh');

};

SlctCargarArticulo=function(result){
    var html="<option value='0'>.::Seleccione::.</option>";
    $.each(result.data,function(index,r){
        html+="<option value="+r.id+">"+r.articulo+"</option>";
    });
    $("#ModalVentaForm #slct_articulo_id").html(html); 
    $("#ModalVentaForm #slct_articulo_id").selectpicker('refresh');

};

HtmlCargarProducto=function(result){
    var html="";
    $('#TableProducto').DataTable().destroy();

    $.each(result.data,function(index,r){
        html+="<tr id='trid_"+r.id+"'>"+
            "<td class='foto'>"+r.foto+"</td>"+
            "<td class='producto'>"+r.producto+"</td>"+
            '<td><span class="btn btn-primary btn-sm" onClick="SeleccionarProducto(0,'+r.id+','+r.precio_venta+')"><i class="glyphicon glyphicon-ok"></i> </span></td>';
        html+="</tr>";
     
    });
    $("#ModalVentaForm #lisproducto").html(html); 


};


SeleccionarProducto = function(val,id,precio_venta){
    var existe=$("#t_lista_venta #trid_"+id+"").val();
    if( val==0 && typeof(existe)=='undefined'){
        

      //  var producto=$("#t_lista_venta #trid_"+id+" .producto").text();
        //var precio_venta=$("#t_lista_venta #trid_"+id+" .precio_venta").text();
        var producto=$("#TableProducto #trid_"+id+" .producto").html();

        
        var foto=$("#t_lista_venta #trid_"+id+" .foto").val();
        var html="";
        html+="<tr id='trid_"+id+"'>"+
        /*
            ACA ESTAN LOS CAMPOS QUE SE AGREGAN CADA VEZ QUE SE DA SELECCIONAR PRODUCTO
  
        */

              "<td><input type='number' onBlur='calcularMontos("+id+", this.value, "+precio_venta+")' class='form-control' id='cantidad-"+id+"' enable></td>"+ //CANTIDAD
             
             // $('#ModalVentaForm #txt_total').val( ProductoG.precio_venta );
              "<td><input type='text' class='form-control' id='precio-"+id+"' value='"+precio_venta+"' disabled></td>"+ // PRECIO
              "<td><input type='text' class='form-control' id='producto-"+id+"' value='"+producto+"' disabled></td>"+ // PRODUCTO
              "<td><input type='text' class='form-control' disabled></td>"+ //IMAGEN

              "<td><input type='text' class='form-control preciototal' id='preciototal-"+id+"' name='preciototal[]' disabled></td>"+ //PRECIO TOTAL
            
            '<td><a onClick="Eliminar('+id+')" class="btn btn-danger" ><i class="fa fa-trash fa-lg"></i></a></td>'; //ELIMINAR

          html+="</tr>";
        
        $("#t_lista_venta").append(html);
       
        $('#ModalVenta').modal('hide');
    }else {
        msjG.mensaje('warning',"Ya se agregó el  Producto",3000);
    }
};

Eliminar = function (tr) {
        var c = confirm("¿Está seguro de Eliminar el Producto?");
        if (c) {
            $("#t_lista_venta #trid_"+tr+"").remove();     

        }
};

//CALCULA EL PRECIO TOTAL DEL PRODUCTO  = CANTIDAD * PRECIO_VENTA
calcularMontos = function (id, cantidad, precio_venta) {

    $('#detallePrecioVenta #txt_IGV').val('0.00');
    $('#detallePrecioVenta #txt_subtotal').val('0.00');
    $('#detallePrecioVenta #txt_monto_total').val('0.00');  
    $('#preciototal-'+id).val('');
    
    //PRECIO TOTAL DE UN PRODUCTO
    PrecioTotalG=(cantidad*precio_venta);
    $('#preciototal-'+id).val(PrecioTotalG);

    //SE CREA UNA VARIABLE TEMPORAL igv PARA REALIZAR LOS CALCULOS
    var igv = 0.00;

    //SE RECORRE TODOS LOS PRECIOS TOTALES DE LOS PRODUCTOS AÑADIDOS Y SE CALCULA EL IGV, SUBTOTAL Y TOTAL
    $('.preciototal').each(function(){       
    TotalG = TotalG + parseFloat($(this).val());
    SubTotalG = (TotalG/IGVG);
    igv = (TotalG-SubTotalG);
    });    
    
    //SE MUESTRA EN LAS CAJAS DE TEXTO LOS RESULTADOS
    $('#detallePrecioVenta #txt_IGV').val(igv.toFixed(2));
    $('#detallePrecioVenta #txt_subtotal').val(SubTotalG.toFixed(2)); 
    $('#detallePrecioVenta #txt_monto_total').val(TotalG.toFixed(2));  
    igv = 0.00; 
    SubTotalG = 0.00; 
    TotalG = 0.00; 
        
       
      
};

</script>

