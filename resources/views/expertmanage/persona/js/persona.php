<script type="text/javascript">
var AddEdit=0; //0: Editar | 1: Agregar
var PersonaG={id:0,paterno:"",materno:"",nombre:"",dni:"",sexo:"",email:"",password:"",telefono:"",celular:"",fecha_nacimiento:"",estado:1}; // Datos Globales
$(document).ready(function() {
    $("#TablePersona").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false
    });
    AjaxPersona.Cargar(HTMLCargarPersona);
    $("#PersonaForm #TablePersona select").change(function(){ AjaxPersona.Cargar(HTMLCargarPersona); });
    $("#PersonaForm #TablePersona input").blur(function(){ AjaxPersona.Cargar(HTMLCargarPersona); });

    $('#ModalPersona').on('shown.bs.modal', function (event) {

        /*$('#txt_fecha_nacimiento').daterangepicker({
            format: 'YYYY-MM-DD',
            singleDatePicker: true,
            showDropdowns: true
        });*/

        if( AddEdit==1 ){
            $(this).find('.modal-footer .btn-primary').text('Guardar').attr('onClick','AgregarEditarAjax();');
        }
        else{
            $(this).find('.modal-footer .btn-primary').text('Actualizar').attr('onClick','AgregarEditarAjax();');
            $("#ModalPersonaForm").append("<input type='hidden' value='"+PersonaG.id+"' name='id'>");
        }

        $('#ModalPersonaForm #txt_paterno').val( PersonaG.paterno );
        $('#ModalPersonaForm #txt_materno').val( PersonaG.materno );
        $('#ModalPersonaForm #txt_nombre').val( PersonaG.nombre );
        $('#ModalPersonaForm #txt_dni').val( PersonaG.dni );
        $('#ModalPersonaForm #slct_sexo').val( PersonaG.sexo );
        $('#ModalPersonaForm #txt_email').val( PersonaG.email );
        $('#ModalPersonaForm #txt_password').val( PersonaG.password );
        $('#ModalPersonaForm #txt_telefono').val( PersonaG.telefono );
        $('#ModalPersonaForm #txt_celular').val( PersonaG.celular );
        $('#ModalPersonaForm #txt_fecha_nacimiento').val( PersonaG.fecha_nacimiento );
        $('#ModalPersonaForm #slct_estado').val( PersonaG.estado );
        $('#ModalPersonaForm #txt_nombre').focus();
    });

    $('#ModalPersona').on('hide.bs.modal', function (event) {
        $("ModalPersonaForm input[type='hidden']").remove();
        $("ModalPersonaForm input").val('');
    });
});

ValidaForm=function(){
    var r=true;
    if( $.trim( $("#ModalPersonaForm #txt_paterno").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Apellido Paterno',4000);
    }
    if( $.trim( $("#ModalPersonaForm #txt_materno").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Apellido Materno',4000);
    }
    if( $.trim( $("#ModalPersonaForm #txt_nombre").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Nombre',4000);
    }
    if( $.trim( $("#ModalPersonaForm #txt_dni").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese DNI',4000);
    }
    if( $.trim( $("#ModalPersonaForm #slct_sexo").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Sleccione Sexo',4000);
    }
    if( $.trim( $("#ModalPersonaForm #txt_password").val() )=='' ){
        r=false;
        msjG.mensaje('warning','Ingrese Password',4000);
    }
    

    return r;
}

AgregarEditar=function(val,id){
    AddEdit=val;
    PersonaG.id='';
    PersonaG.paterno='';
    PersonaG.materno='';
    PersonaG.nombre='';
    PersonaG.dni='';
    PersonaG.sexo='';
    PersonaG.email='';
    PersonaG.passowrd='';
    PersonaG.telefono='';
    PersonaG.celular='';
    PersonaG.fecha_nacimiento='';
    PersonaG.estado='1';
    if( val==0 ){
        PersonaG.id=id;
        PersonaG.paterno=$("#TablePersona #trid_"+id+" .paterno").text();
        PersonaG.materno=$("#TablePersona #trid_"+id+" .materno").text();
        PersonaG.nombre=$("#TablePersona #trid_"+id+" .nombre").text();
        PersonaG.dni=$("#TablePersona #trid_"+id+" .dni").text();
        PersonaG.sexo=$("#TablePersona #trid_"+id+" .sexo").val();
        PersonaG.email=$("#TablePersona #trid_"+id+" .email").text();
        PersonaG.passowrd=$("#TablePersona #trid_"+id+" .passowrd").val( '' );
        PersonaG.telefono=$("#TablePersona #trid_"+id+" .telefono").text();
        PersonaG.celular=$("#TablePersona #trid_"+id+" .celular").text();
        PersonaG.fecha_nacimiento=$("#TablePersona #trid_"+id+" .fecha_nacimiento").text();
        PersonaG.estado=$("#TablePersona #trid_"+id+" .estado").val();
    }
    $('#ModalPersona').modal('show');
}

CambiarEstado=function(estado,id){
    AjaxPersona.CambiarEstado(HTMLCambiarEstado,estado,id);
}

HTMLCambiarEstado=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        AjaxPersona.Cargar(HTMLCargarPersona);
    }
}

AgregarEditarAjax=function(){
    if( ValidaForm() ){
        AjaxPersona.AgregarEditar(HTMLAgregarEditar);
    }
}

HTMLAgregarEditar=function(result){
    if( result.rst==1 ){
        msjG.mensaje('success',result.msj,4000);
        $('#ModalPersona').modal('hide');
        AjaxPersona.Cargar(HTMLCargarPersona);
    }
    else{
        msjG.mensaje('warning',result.msj,3000);
    }
}

HTMLCargarPersona=function(result){
    var html="";
    $('#TablePersona').DataTable().destroy();

    $.each(result.data.data,function(index,r){
        estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(1,'+r.id+')" class="btn btn-danger">Inactivo</span>';
        if(r.estado==1){
            estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(0,'+r.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr id='trid_"+r.id+"'>"+
            "<td class='paterno'>"+r.paterno+"</td>"+
            "<td class='materno'>"+r.materno+"</td>"+
            "<td class='nombre'>"+r.nombre+"</td>"+
            "<td class='dni'>"+r.dni+"</td>"+
            "<td class='email'>"+r.email+"</td>"+
            "<td><input type='hidden' class='estado' value='"+r.estado+"'>"+estadohtml+"</td>"+
            '<td><a class="btn btn-primary btn-sm" onClick="AgregarEditar(0,'+r.id+')"><i class="fa fa-edit fa-lg"></i> </a></td>';
        html+="</tr>";
    });
    $("#TablePersona tbody").html(html); 
    $("#TablePersona").DataTable({
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
            $('#TablePersona_paginate ul').remove();
            masterG.CargarPaginacion(result.data,'#TablePersona_paginate');
        } 
    });
};
</script>