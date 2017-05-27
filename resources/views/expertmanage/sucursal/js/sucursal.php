<script type="text/javascript">
var AddEdit=0; //0: Editar | 1: Agregar
var SucursalG={id:0,sucursal:"",direccion:"",telefono:"",celular:"",email:"",estado:1}; // Datos Globales
$(document).ready(function() {
    $("#TableSucursal").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false
    });
    AjaxSucursal.Cargar(HTMLCargarSucursal);
    $("#SucursalForm #TableSucursal select").change(function(){ AjaxSucursal.Cargar(HTMLCargarSucursal); });
    $("#SucursalForm #TableSucursal input").blur(function(){ AjaxSucursal.Cargar(HTMLCargarSucursal); });

    $('#ModalSucursal').on('shown.bs.modal', function (event) {
        if( AddEdit==1 ){
            $(this).find('.modal-footer .btn-primary').text('Guardar').attr('onClick','AgregarEditarAjax();');
        }
        else{
            $(this).find('.modal-footer .btn-primary').text('Actualizar').attr('onClick','AgregarEditarAjax();');
            $("#ModalSucursalForm").append("<input type='hidden' value='"+SucursalG.id+"' name='id'>");
        }

        $('#ModalSucursalForm #txt_sucursal').val( SucursalG.sucursal );
        $('#ModalSucursalForm #txt_direccion').val( SucursalG.direccion );
        $('#ModalSucursalForm #txt_telefono').val( SucursalG.telefono );
        $('#ModalSucursalForm #txt_celular').val( SucursalG.celular );
        $('#ModalSucursalForm #txt_email').val( SucursalG.email );
        /*$('#ModalSucursalForm #txt_foto').val( SucursalG.foto );*/
        $('#ModalSucursalForm #slct_estado').val( SucursalG.estado );
        $('#ModalSucursalForm #txt_sucursal').focus();
    });

    $('#ModalSucursal').on('hide.bs.modal', function (event) {
        $("ModalSucursalForm input[type='hidden']").remove();
        $("ModalSucursalForm input").val('');
    });
});

ValidaForm=function(){
    var r=true;
    if( $.trim( $("#ModalSucursalForm #txt_sucursal").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Sucursal',4000);
    }
    /*if( $.trim( $("#ModalSucursalForm #txt_direccion").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Direccion',4000);
    }
    if( $.trim( $("#ModalSucursalForm #txt_telefono").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Telefono',4000);
    }
    if( $.trim( $("#ModalSucursalForm #txt_celular").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Celular',4000);
    }
    if( $.trim( $("#ModalSucursalForm #txt_email").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Email',4000);
    }
    if( $.trim( $("#ModalSucursalForm #txt_foto").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Foto',4000);
    }*/
    return r;
}

AgregarEditar=function(val,id){
    AddEdit=val;
    SucursalG.id='';
    SucursalG.sucursal='';
    SucursalG.direccion='';
    SucursalG.telefono='';
    SucursalG.celular='';
    SucursalG.email='';
    SucursalG.estado='1';
    if( val==0 ){
        SucursalG.id=id;
        SucursalG.sucursal=$("#TableSucursal #trid_"+id+" .sucursal").text();
        SucursalG.direccion=$("#TableSucursal #trid_"+id+" .direccion").text();
        SucursalG.telefono=$("#TableSucursal #trid_"+id+" .telefono").text();
        SucursalG.celular=$("#TableSucursal #trid_"+id+" .celular").text();
        SucursalG.email=$("#TableSucursal #trid_"+id+" .email").text();
        SucursalG.estado=$("#TableSucursal #trid_"+id+" .estado").val();
    }
    $('#ModalSucursal').modal('show');
}

CambiarEstado=function(estado,id){
    AjaxSucursal.CambiarEstado(HTMLCambiarEstado,estado,id);
}

HTMLCambiarEstado=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        AjaxSucursal.Cargar(HTMLCargarSucursal);
    }
}

AgregarEditarAjax=function(){
    if( ValidaForm() ){
        AjaxSucursal.AgregarEditar(HTMLAgregarEditar);
    }
}

HTMLAgregarEditar=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        $('#ModalSucursal').modal('hide');
        AjaxSucursal.Cargar(HTMLCargarSucursal);
    }
    else{
        msjG.mensaje('warning',result.msj,3000);
    }
}

HTMLCargarSucursal=function(result){
    var html="";
    $('#TableSucursal').DataTable().destroy();

    $.each(result.data.data,function(index,r){
        estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(1,'+r.id+')" class="btn btn-danger">Inactivo</span>';
        if(r.estado==1){
            estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(0,'+r.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr id='trid_"+r.id+"'>"+
            "<td class='sucursal'>"+r.sucursal+"</td>"+
            "<td class='direccion'>"+r.direccion+"</td>"+
            "<td class='telefono'>"+r.telefono+"</td>"+
            "<td class='celular'>"+r.celular+"</td>"+
            "<td class='email'>"+r.email+"</td>"+
            "<td><input type='hidden' class='estado' value='"+r.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" onClick="AgregarEditar(0,'+r.id+')"><i class="fa fa-edit fa-lg"></i> </a></td>';
        html+="</tr>";
    });
    $("#TableSucursal tbody").html(html); 
    $("#TableSucursal").DataTable({
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
            $('#TableSucursal_paginate ul').remove();
            masterG.CargarPaginacion(result.data,'#TableSucursal_paginate');
        }
    });
};
</script>
