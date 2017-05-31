<script type="text/javascript">
var AddEdit=0; //0: Editar | 1: Agregar
var EmpresaG={id:0,
persona_id:"",
razon_social:"",
ruc:"",
nombre_comercial:"",
direccion_fiscal:"",
telefono:"",
celular:"",
email:"",
estado:1}; // Datos Globales
$(document).ready(function() {
    $("#TableEmpresa").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false
    });
    AjaxEmpresa.Cargar(HTMLCargarEmpresa);
    $("#EmpresaForm #TableEmpresa select").change(function(){ AjaxEmpresa.Cargar(HTMLCargarEmpresa); });
    $("#EmpresaForm #TableEmpresa input").blur(function(){ AjaxEmpresa.Cargar(HTMLCargarEmpresa); });

    $('#ModalEmpresa').on('shown.bs.modal', function (event) {
        if( AddEdit==1 ){
            $(this).find('.modal-footer .btn-primary').text('Guardar').attr('onClick','AgregarEditarAjax();');
        }
        else{
            $(this).find('.modal-footer .btn-primary').text('Actualizar').attr('onClick','AgregarEditarAjax();');
            $("#ModalEmpresaForm").append("<input type='hidden' value='"+EmpresaG.id+"' name='id'>");
        }

        $('#ModalEmpresaForm #txt_persona_id').val( EmpresaG.persona_id );
        $('#ModalEmpresaForm #txt_razon_social').val( EmpresaG.razon_social );
        $('#ModalEmpresaForm #txt_ruc').val( EmpresaG.ruc );
        $('#ModalEmpresaForm #txt_nombre_comercial').val( EmpresaG.persona_id );
        $('#ModalEmpresaForm #txt_direccion_fiscal').val( EmpresaG.direccion_fiscal );
        $('#ModalEmpresaForm #txt_telefono').val( EmpresaG.telefono );
        $('#ModalEmpresaForm #txt_celular').val( EmpresaG.celular );
        $('#ModalEmpresaForm #txt_email').val( EmpresaG.email );
        $('#ModalEmpresaForm #slct_estado').val( EmpresaG.estado );
        $('#ModalEmpresaForm #txt_persona_id').focus();
    });

    $('#ModalEmpresa').on('hide.bs.modal', function (event) {
        $("ModalEmpresaForm input[type='hidden']").remove();
        $("ModalEmpresaForm input").val('');
    });
});

ValidaForm=function(){
    var r=true;
    if( $.trim( $("#ModalEmpresaForm #txt_persona_id").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Persona',4000);
    }
    if( $.trim( $("#ModalEmpresaForm #txt_razon_social").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Razon Social',4000);
    }
    if( $.trim( $("#ModalEmpresaForm #txt_ruc").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese RUC',4000);
    }
    return r;
}

AgregarEditar=function(val,id){
    AddEdit=val;
    EmpresaG.id='';
    EmpresaG.persona_id='';
    EmpresaG.razon_social='';
    EmpresaG.nombre_comercial='';
    EmpresaG.direccion_fiscal='';
    EmpresaG.telefono='';
    EmpresaG.celular='';
    EmpresaG.email='';
    EmpresaG.estado='1';
    if( val==0 ){
        EmpresaG.id=id;
        EmpresaG.persona_id=$("#TableEmpresa #trid_"+id+" .persona_id").text();
        EmpresaG.razon_social=$("#TableEmpresa #trid_"+id+" .razon_social").text();
        EmpresaG.nombre_comercial=$("#TableEmpresa #trid_"+id+" .nombre_comercial").text();
        EmpresaG.direccion_fiscal=$("#TableEmpresa #trid_"+id+" .direccion_fiscal").text();
        EmpresaG.telefono=$("#TableEmpresa #trid_"+id+" .telefono").text();
        EmpresaG.celular=$("#TableEmpresa #trid_"+id+" .celular").text();
        EmpresaG.email=$("#TableEmpresa #trid_"+id+" .email").text();
        EmpresaG.estado=$("#TableEmpresa #trid_"+id+" .estado").val();
    }
    $('#ModalEmpresa').modal('show');
}

CambiarEstado=function(estado,id){
    AjaxEmpresa.CambiarEstado(HTMLCambiarEstado,estado,id);
}

HTMLCambiarEstado=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        AjaxEmpresa.Cargar(HTMLCargarEmpresa);
    }
}

AgregarEditarAjax=function(){
    if( ValidaForm() ){
        AjaxEmpresa.AgregarEditar(HTMLAgregarEditar);
    }
}

HTMLAgregarEditar=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        $('#ModalEmpresa').modal('hide');
        AjaxEmpresa.Cargar(HTMLCargarEmpresa);
    }
    else{
        msjG.mensaje('warning',result.msj,3000);
    }
}

HTMLCargarEmpresa=function(result){
    var html="";
    $('#TableEmpresa').DataTable().destroy();

    $.each(result.data.data,function(index,r){
        estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(1,'+r.id+')" class="btn btn-danger">Inactivo</span>';
        if(r.estado==1){
            estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(0,'+r.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr id='trid_"+r.id+"'>"+
            "<td class='empresa'>"+r.empresa+"</td>"+
            "<td><input type='hidden' class='estado' value='"+r.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" onClick="AgregarEditar(0,'+r.id+')"><i class="fa fa-edit fa-lg"></i> </a></td>';
        html+="</tr>";
    });
    $("#TableEmpresa tbody").html(html); 
    $("#TableEmpresa").DataTable({
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
            $('#TableEmpresa_paginate ul').remove();
            masterG.CargarPaginacion(result.data,'#TableEmpresa_paginate');
        }
    });
};
</script>