<script type="text/javascript">
var AddEdit=0; //0: Editar | 1: Agregar
var VentaG={id:0,cliente_id:0,cliente:"",sucursal_id:0,proforma_id:0,fecha_venta:"",dscto_monto:"",subtotal:"",igv_monto:"",igv:"",total:"",moneda:0,estado:1}; // Datos Globales
$(document).ready(function() {
    $(".fechas").datetimepicker({
        format: "yyyy-mm-dd",
        language: 'es',
        showMeridian: false,
        time:false,
        minView:2,
        autoclose: true,
        todayBtn: false
    });

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
        $('#ModalVentaForm #slct_sucursal').val( VentaG.sucursal_id );
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
});


ValidaForm=function(){
    var r=true;
    if( $.trim( $("#ModalVentaForm #txt_cliente").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Seleccione Cliente',4000);
    }
    else if( $.trim( $("#ModalVentaForm #slct_sucursal").val() )=='0' ){
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
    VentaG.sucursal_id='0';
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
        VentaG.sucursal_id=$("#TableVenta #trid_"+id+" .sucursal_id").val();
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
            "<td class='sucursal'>"+r.sucursal+"</td>"+
            "<td class='precio_venta'>"+r.precio_venta+"</td>"+
            "<td>"+
            "<input type='hidden' class='cliente_id' value='"+r.cliente_id+"'>"+
            "<input type='hidden' class='sucursal_id' value='"+r.sucursal_id+"'>"+
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
</script>

