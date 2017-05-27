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
   
    $("#PersonaForm #TablePersona select").change(function(){ AjaxPersona.Cargar(HTMLCargarPersona); });
    $("#PersonaForm #TablePersona input").blur(function(){ AjaxPersona.Cargar(HTMLCargarPersona); });

    $('#Modallistapersona').on('shown.bs.modal', function (event) {
         AjaxPersona.Cargar(HTMLCargarPersona);
    });

    $('#Modallistapersona').on('hide.bs.modal', function (event) {
        $("ModalPersonaForm input[type='hidden']").remove();
        $("ModalPersonaForm input").val('');
    });
});

SeleccionarPersona = function(obj){
    var iduser = obj.getAttribute('id-user');
    if(iduser){
        Bandeja.GetPersonabyId({persona_id:iduser});
        $('#selectPersona').modal('hide');
    }else{
        alert('Seleccione persona');
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
            '<td><span class="btn btn-primary btn-sm" id-user='+r.id+' onClick="SeleccionarPersona(this)">Seleccionar</span></td>';

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
