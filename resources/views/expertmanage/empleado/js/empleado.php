<script type="text/javascript">
var AddEdit=0; //0: Editar | 1: Agregar
var EmpleadoG={id:0,cargo:"",estado:1}; // Datos Globales
$(document).ready(function() {
    $("#TableEmpleado").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false
    });
    AjaxEmpleado.Cargar(HTMLCargarEmpleado);
    $("#EmpleadoForm #TableEmpleado select").change(function(){ AjaxEmpleado.Cargar(HTMLCargarEmpleado); });
    $("#EmpleadoForm #TableEmpleado input").blur(function(){ AjaxEmpleado.Cargar(HTMLCargarEmpleado); });

    $('#ModalEmpleado').on('shown.bs.modal', function (event) {
        if( AddEdit==1 ){
            $(this).find('.modal-footer .btn-primary').text('Guardar').attr('onClick','AgregarEditarAjax();');
        }
        else{
            $(this).find('.modal-footer .btn-primary').text('Actualizar').attr('onClick','AgregarEditarAjax();');
            $("#ModalEmpleadoForm").append("<input type='hidden' value='"+EmpleadoG.id+"' name='id'>");
        }

        $('#ModalEmpleadoForm #slct_persona').val( EmpleadoG.cargo );
        $('#ModalEmpleadoForm #slct_estado').val( EmpleadoG.estado );
        $('#ModalEmpleadoForm #slct_persona').focus();
    });

    $('#ModalEmpleado').on('hide.bs.modal', function (event) {
        $("ModalEmpleadoForm input[type='hidden']").remove();
        $("ModalEmpleadoForm input").val('');
    });
});

ValidaForm=function(){
    var r=true;
    if( $.trim( $("#ModalEmpleadoForm #slct_persona").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Empleado',4000);
    }
    return r;
}

AgregarEditar=function(val,id){
    AddEdit=val;
    EmpleadoG.id='';
    EmpleadoG.cargo='';
    EmpleadoG.estado='1';
    if( val==0 ){
        EmpleadoG.id=id;
        EmpleadoG.cargo=$("#TableEmpleado #trid_"+id+" .cargo").text();
        EmpleadoG.estado=$("#TableEmpleado #trid_"+id+" .estado").val();
    }
    $('#ModalEmpleado').modal('show');
}

CambiarEstado=function(estado,id){
    AjaxEmpleado.CambiarEstado(HTMLCambiarEstado,estado,id);
}

HTMLCambiarEstado=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        AjaxEmpleado.Cargar(HTMLCargarEmpleado);
    }
}

AgregarEditarAjax=function(){
    if( ValidaForm() ){
        AjaxEmpleado.AgregarEditar(HTMLAgregarEditar);
    }
}

HTMLAgregarEditar=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        $('#ModalEmpleado').modal('hide');
        AjaxEmpleado.Cargar(HTMLCargarEmpleado);
    }
    else{
        msjG.mensaje('warning',result.msj,3000);
    }
}

HTMLCargarEmpleado=function(result){
    var html="";
    $('#TableEmpleado').DataTable().destroy();

    $.each(result.data.data,function(index,r){
        estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(1,'+r.id+')" class="btn btn-danger">Inactivo</span>';
        if(r.estado==1){
            estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(0,'+r.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr id='trid_"+r.id+"'>"+
            "<td class='persona'>"+r.paterno+" "+r.materno+" "+r.nombre+"</td>"+
            "<td class='sucursal'>"+r.sucursal+"</td>"+
            "<td class='cargo'>"+r.cargo+"</td>"+
            "<td><input type='hidden' class='estado' value='"+r.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" onClick="AgregarEditar(0,'+r.id+')"><i class="fa fa-edit fa-lg"></i> </a></td>';
        html+="</tr>";
    });
    $("#TableEmpleado tbody").html(html); 
    $("#TableEmpleado").DataTable({
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
            $('#TableEmpleado_paginate ul').remove();
            masterG.CargarPaginacion(result.data,'#TableEmpleado_paginate');
        }
    });
};
</script>
