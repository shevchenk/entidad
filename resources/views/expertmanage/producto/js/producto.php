<script type="text/javascript">
var AddEdit=0; //0: Editar | 1: Agregar
var ProductoG={id:0,articulo_id:0,sucursal_id:0,producto:"",precio_venta:"",precio_compra:"",moneda:"",stock:"",
               stock_minimo:"",dias_alerta:"",fecha_vencimiento:"",dias_vencimiento:"",estado:1}; // Datos Globales
$(document).ready(function() {
    $("#TableProducto").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false
    });
    CargarSlct(1);
    CargarSlct(3);
    AjaxProducto.Cargar(HTMLCargarProducto);
    $("#ProductoForm #TableProducto select").change(function(){ AjaxProducto.Cargar(HTMLCargarProducto); });
    $("#ProductoForm #TableProducto input").blur(function(){ AjaxProducto.Cargar(HTMLCargarProducto); });
    
    $('#ModalProducto').on('shown.bs.modal', function (event) {
        if( AddEdit==1 ){
            $(this).find('.modal-footer .btn-primary').text('Guardar').attr('onClick','AgregarEditarAjax();');
        }
        else{
            $(this).find('.modal-footer .btn-primary').text('Actualizar').attr('onClick','AgregarEditarAjax();');
            $("#ModalProductoForm").append("<input type='hidden' value='"+ProductoG.id+"' name='id'>");
        }

        $('#ModalProductoForm #txt_producto').val( ProductoG.producto );
        $('#ModalProductoForm #slct_articulo').val( ProductoG.articulo_id );
        $('#ModalProductoForm #slct_sucursal').val( ProductoG.sucursal_id );
        $('#ModalProductoForm #txt_precio_venta').val( ProductoG.precio_venta );
        $('#ModalProductoForm #txt_precio_compra').val( ProductoG.precio_compra );
        $('#ModalProductoForm #slct_moneda').val( ProductoG.moneda );
        $('#ModalProductoForm #txt_stock').val( ProductoG.stock );
        $('#ModalProductoForm #txt_stock_minimo').val( ProductoG.stock_minimo );
        $('#ModalProductoForm #txt_dias_alerta').val( ProductoG.dias_alerta );
        $('#ModalProductoForm #txt_fecha_vencimiento').val( ProductoG.fecha_vencimiento );
        $('#ModalProductoForm #txt_dias_vencimiento').val( ProductoG.dias_vencimiento );
        $('#ModalProductoForm #slct_estado').val( ProductoG.estado );
        
        $('#ModalProductoForm #txt_producto').focus();
    });

    $('#ModalProducto').on('hide.bs.modal', function (event) {
        $("#ModalProductoForm input[type='hidden']").not('.mant').remove();

    });
});

ValidaForm=function(){
    var r=true;
    if( $.trim( $("#ModalProductoForm #txt_producto").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Producto',4000);
    }
    else if( $.trim( $("#ModalProductoForm #slct_sucursal").val() )=='0' ){
        r=false;
        msjG.mensaje('warning','Seleccione Sucursal',4000);
    }
    else if( $.trim( $("#ModalProductoForm #slct_articulo").val() )=='0' ){
        r=false;
        msjG.mensaje('warning','Seleccione Artículo',4000);
    }
    else if( $.trim( $("#ModalProductoForm #txt_precio_venta").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Precio de Venta',4000);
    }
    else if( $.trim( $("#ModalProductoForm #slct_moneda").val() )=='0' ){
        r=false;
        msjG.mensaje('warning','Seleccione Moneda',4000);
    }
    else if( $.trim( $("#ModalProductoForm #txt_stock").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Stock',4000);
    }
    else if( $.trim( $("#ModalProductoForm #txt_stock_minimo").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Stock Mínimo',4000);
    }
    else if( $.trim( $("#ModalProductoForm #txt_dias_alerta").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese días de alerta',4000);
    }
    else if( $.trim( $("#ModalProductoForm #txt_fecha_vencimiento").val() )=='' && 
            $.trim( $("#ModalProductoForm #txt_dias_vencimiento").val() )==''){
        r=false;
        msjG.mensaje('warning','Ingrese Fecha o días de vencimiento',4000);
    }
    return r;
}

AgregarEditar=function(val,id){
    AddEdit=val;
    ProductoG.id='';
    ProductoG.articulo_id='0';
    ProductoG.sucursal_id='0';
    ProductoG.moneda='0';
    ProductoG.stock='';
    ProductoG.stock_minimo='';
    ProductoG.dias_alerta='';
    ProductoG.fecha_vencimiento='';
    ProductoG.dias_vencimiento='';
    ProductoG.producto='';
    ProductoG.precio_venta='';
    ProductoG.precio_compra='';
    ProductoG.estado='1';
    if( val==0 ){
        ProductoG.id=id;
        ProductoG.articulo_id=$("#TableProducto #trid_"+id+" .articulo_id").val();
        ProductoG.sucursal_id=$("#TableProducto #trid_"+id+" .sucursal_id").val();
        ProductoG.moneda=$("#TableProducto #trid_"+id+" .moneda").val();
        ProductoG.stock=$("#TableProducto #trid_"+id+" .stock").val();
        ProductoG.stock_minimo=$("#TableProducto #trid_"+id+" .stock_minimo").val();
        ProductoG.dias_alerta=$("#TableProducto #trid_"+id+" .dias_alerta").val();
        ProductoG.fecha_vencimiento=$("#TableProducto #trid_"+id+" .fecha_vencimiento").val();
        ProductoG.dias_vencimiento=$("#TableProducto #trid_"+id+" .dias_vencimiento").val();
        ProductoG.producto=$("#TableProducto #trid_"+id+" .producto").text();
        ProductoG.precio_venta=$("#TableProducto #trid_"+id+" .precio_venta").text();
        ProductoG.precio_compra=$("#TableProducto #trid_"+id+" .precio_compra").text();
        ProductoG.estado=$("#TableProducto #trid_"+id+" .estado").val();
    }
    $('#ModalProducto').modal('show');
}

CambiarEstado=function(estado,id){
    AjaxProducto.CambiarEstado(HTMLCambiarEstado,estado,id);
}

HTMLCambiarEstado=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        AjaxProducto.Cargar(HTMLCargarProducto);
    }
}

AgregarEditarAjax=function(){
    if( ValidaForm() ){
        AjaxProducto.AgregarEditar(HTMLAgregarEditar);
    }
}

HTMLAgregarEditar=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        $('#ModalProducto').modal('hide');
        AjaxProducto.Cargar(HTMLCargarProducto);
    }else{
        msjG.mensaje('warning',result.msj,3000);
    }
}

HTMLCargarProducto=function(result){
    var html="";
    $('#TableProducto').DataTable().destroy();

    $.each(result.data.data,function(index,r){
        estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(1,'+r.id+')" class="btn btn-danger">Inactivo</span>';
        if(r.estado==1){
            estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(0,'+r.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr id='trid_"+r.id+"'>"+
            "<td class='producto'>"+r.producto+"</td>"+
            "<td class='precio_venta'>"+r.precio_venta+"</td>"+
            "<td class='precio_compra'>"+r.precio_compra+"</td>"+
            "<td>"+
            "<input type='hidden' class='articulo_id' value='"+r.articulo_id+"'>"+
            "<input type='hidden' class='sucursal_id' value='"+r.sucursal_id+"'>"+
            "<input type='hidden' class='moneda' value='"+r.moneda+"'>"+
            "<input type='hidden' class='stock' value='"+r.stock+"'>"+
            "<input type='hidden' class='stock_minimo' value='"+r.stock_minimo+"'>"+
            "<input type='hidden' class='dias_alerta' value='"+r.dias_alerta+"'>"+
            "<input type='hidden' class='fecha_vencimiento' value='"+r.fecha_vencimiento+"'>"+
            "<input type='hidden' class='dias_vencimiento' value='"+r.dias_vencimiento+"'>"+
            "<input type='hidden' class='estado' value='"+r.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" onClick="AgregarEditar(0,'+r.id+')"><i class="fa fa-edit fa-lg"></i> </a></td>';
        html+="</tr>";
    });
    $("#TableProducto tbody").html(html); 
    $("#TableProducto").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false,
        "lengthMenu": [10],
        "language": {
            "info": "Mostrando página "+result.data.current_page+" / "+result.data.last_page+" de "+result.data.total,
            "infoEmpty": "No éxite registro(s) aún",
        },
        "initComplete": function () {
            $('#TableProducto_paginate ul').remove();
            masterG.CargarPaginacion('HTMLCargarProducto','AjaxProducto',result.data,'#TableProducto_paginate');
        }
    });
};

CargarSlct=function(slct){
    if(slct==1){
    AjaxProducto.CargarSucursal(SlctCargarSucursal);
    }
    if(slct==2){
    AjaxProducto.CargarCategoria(SlctCargarCategoria);
    }
    if(slct==3){
    AjaxProducto.CargarArticulo(SlctCargarArticulo);
    }
}

SlctCargarSucursal=function(result){
    var html="<option value='0'>.::Seleccione::.</option>";
    $.each(result.data,function(index,r){
        html+="<option value="+r.id+">"+r.sucursal+"</option>";
    });
    $("#ModalProducto #slct_sucursal").html(html); 

};

SlctCargarArticulo=function(result){
    var html="<option value='0'>.::Seleccione::.</option>";
    $.each(result.data,function(index,r){
        html+="<option value="+r.id+">"+r.articulo+"</option>";
    });
    $("#ModalProducto #slct_articulo").html(html); 

};

Cargar=function(tipo){
    
    if(tipo==2){
    AjaxCategoria.Cargar(HTMLCargarCategoria1);
    $("#CategoriaForm").css("display","");
    $("#ArticuloForm").css("display","none");
    }
    if(tipo==1){
    AjaxArticulo.Cargar(HTMLCargarArticulo2);
    $("#ArticuloForm").css("display","");
    $("#CategoriaForm").css("display","none");
    }
 
};

onPagos = function (event) {
        var files = event.target.files || event.dataTransfer.files;
        if (!files.length)
            return;
        var image = new Image();
        var reader = new FileReader();
        reader.onload = (e) => {
            $('#ModalProductoForm #pago_archivo').val(e.target.result);
        };
        reader.readAsDataURL(files[0]);
        $('#ModalProductoForm #pago_nombre').val(files[0].name);
        console.log(files[0].name);
    };

</script>
