<script type="text/javascript">
var AddEdit=0; //0: Editar | 1: Agregar
var ProveedorG={id:0,persona_id:0,persona:"",cargo_id:0,sucursal_id:0,fecha_inicio:"",fecha_final:"",estado:1}; // Datos Globales
$(document).ready(function() {
    $("#TableProveedor").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false
    });


    AjaxProveedor.Cargar(HTMLCargarProveedor);
    $("#ProveedorForm #TableProveedor select").change(function(){ AjaxProveedor.Cargar(HTMLCargarProveedor); });
    $("#ProveedorForm #TableProveedor input").blur(function(){ AjaxProveedor.Cargar(HTMLCargarProveedor); });
    
    $('#ModalProveedor').on('shown.bs.modal', function (event) {
        
        if( AddEdit==1 ){
            $(this).find('.modal-footer .btn-primary').text('Guardar').attr('onClick','AgregarEditarAjax();');
        }
        else{
            $(this).find('.modal-footer .btn-primary').text('Actualizar').attr('onClick','AgregarEditarAjax();');
            $("#ModalProveedorForm").append("<input type='hidden' value='"+ProveedorG.id+"' name='id'>");
        }

        $('#ModalProveedorForm #txt_persona_id').val( ProveedorG.persona_id );
        $('#ModalProveedorForm #txt_persona').val( ProveedorG.persona );
        $('#ModalProveedorForm #slct_sucursal').val( ProveedorG.sucursal_id );
        $('#ModalProveedorForm #slct_cargo').val( ProveedorG.cargo_id );
        $('#ModalProveedorForm #txt_fecha_inicio').val( ProveedorG.fecha_inicio );
        $('#ModalProveedorForm #txt_fecha_final').val( ProveedorG.fecha_final );
        $('#ModalProveedorForm #slct_estado').val( ProveedorG.estado );
        $('#ModalProveedorForm #txt_persona').focus();
    });

    $('#ModalProveedor').on('hide.bs.modal', function (event) {
//        $("ModalProveedorForm input[type='hidden']").remove();
        $("ModalProveedorForm input").val('');
    });
});

ValidaForm=function(){
    var r=true;
    if( $.trim( $("#ModalProveedorForm #txt_persona").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Proveedor',4000);
    }
    return r;
}

AgregarEditar=function(val,id){

    AddEdit=val;
    ProveedorG.id='';
    ProveedorG.persona_id='';
    ProveedorG.persona='';
    ProveedorG.empresa='';
    ProveedorG.empresa_id='0';
    ProveedorG.estado='1';
    if( val==0 ){
        ProveedorG.id=id;
        ProveedorG.persona_id=$("#TableProveedor #trid_"+id+" .persona_id").val();
        ProveedorG.persona=$("#TableProveedor #trid_"+id+" .persona").text();
        ProveedorG.cargo_id=$("#TableProveedor #trid_"+id+" .cargo_id").val();
        ProveedorG.sucursal_id=$("#TableProveedor #trid_"+id+" .sucursal_id").val();
        ProveedorG.fecha_inicio=$("#TableProveedor #trid_"+id+" .fecha_inicio").val();
        ProveedorG.fecha_final=$("#TableProveedor #trid_"+id+" .fecha_final").val();
        ProveedorG.estado=$("#TableProveedor #trid_"+id+" .estado").val();
    }
    $('#ModalProveedor').modal('show');
}

CambiarEstado=function(estado,id){
    AjaxProveedor.CambiarEstado(HTMLCambiarEstado,estado,id);
}

HTMLCambiarEstado=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        AjaxProveedor.Cargar(HTMLCargarProveedor);
    }
}

AgregarEditarAjax=function(){
    if( ValidaForm() ){
        AjaxProveedor.AgregarEditar(HTMLAgregarEditar);
    }
}

HTMLAgregarEditar=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        $('#ModalProveedor').modal('hide');
        AjaxProveedor.Cargar(HTMLCargarProveedor);
    }
    else{
        msjG.mensaje('warning',result.msj,3000);
    }
}

CargarSlct=function(slct){
    if(slct==1){
    AjaxProveedor.CargarSucursal(SlctCargarSucursal);
    }
    if(slct==2){
    AjaxProveedor.CargarCargo(SlctCargarCargo);
    }
}

SlctCargarSucursal=function(result){
    var html="<option value='0'>.::Seleccione::.</option>";
    $.each(result.data,function(index,r){
        html+="<option value="+r.id+">"+r.sucursal+"</option>";
    });
    $("#ModalProveedor #slct_sucursal").html(html); 

}

SlctCargarCargo=function(result){
    var html="<option value='0'>.::Seleccione::.</option>";
    $.each(result.data,function(index,r){
        html+="<option value="+r.id+">"+r.cargo+"</option>";
    });
    $("#ModalProveedor #slct_cargo").html(html); 

}

HTMLCargarProveedor=function(result){
    var html="";
    $('#TableProveedor').DataTable().destroy();

    $.each(result.data.data,function(index,r){
        estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(1,'+r.id+')" class="btn btn-danger">Inactivo</span>';
        if(r.estado==1){
            estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(0,'+r.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr id='trid_"+r.id+"'>"+
            "<td class='persona'>"+r.paterno+" "+r.materno+" "+r.nombre+"</td>"+
            "<td class='sucursal'>"+r.razon_social+"</td>"+
            "<td>"+
            "<input type='hidden' class='persona_id' value='"+r.persona_id+"'>"+
            "<input type='hidden' class='cargo_id' value='"+r.cargo_id+"'>"+
            "<input type='hidden' class='sucursal_id' value='"+r.sucursal_id+"'>"+
            "<input type='hidden' class='fecha_inicio' value='"+r.fecha_inicio+"'>"+
            "<input type='hidden' class='fecha_final' value='"+r.fecha_final+"'>"+
            "<input type='hidden' class='estado' value='"+r.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" onClick="AgregarEditar(0,'+r.id+')"><i class="fa fa-edit fa-lg"></i> </a></td>';
        html+="</tr>";
    });
    $("#TableProveedor tbody").html(html); 
    $("#TableProveedor").DataTable({
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
            $('#TableProveedor_paginate ul').remove();
            masterG.CargarPaginacion(result.data,'#TableProveedor_paginate');
        }
    });
};
</script>
