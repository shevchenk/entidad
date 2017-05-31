<script type="text/javascript">
var LTtextoIdPersona='';
var LTtextoPersona='';
var LTtextoIdEmpresa='';
var LTtextoEmpresa='';
$(document).ready(function() {
    $("#TableListapersona").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false
    });
   
    $('#ModalListapersona').on('shown.bs.modal', function (event) { 
      AjaxListapersona.Cargar(HTMLCargarPersona);
      var button = $(event.relatedTarget); // captura al boton
      LTtextoIdPersona= button.data('personaid');
      LTtextoPersona= button.data('persona');
      LTtextoIdEmpresa= button.data('empresaid');
      LTtextoEmpresa= button.data('empresa');

    });

    $('#ModalListapersona').on('hide.bs.modal', function (event) {
//        $("ModalPersonaForm input[type='hidden']").remove();
//        $("ModalPersonaForm input").val('');
    });
});

SeleccionarPersona = function(val,id){
    $("#"+LTtextoEmpresa).val('');
    $("#"+LTtextoIdEmpresa).val('');
    $("#"+LTtextoPersona).val('');
    $("#"+LTtextoIdPersona).val('');
    if( val==0 ){
        var paterno=$("#TableListapersona #trid_"+id+" .paterno").text();
        var materno=$("#TableListapersona #trid_"+id+" .materno").text();
        var nombre=$("#TableListapersona #trid_"+id+" .nombre").text();
        $("#"+LTtextoPersona).val(paterno+" "+materno+" "+nombre);
        $("#"+LTtextoIdPersona).val(id);
        $('.persona').css("display","");
        $('.empresa').css("display","none");
        $('#ModalListapersona').modal('hide');
    }
    }
    
    
HTMLCargarPersona=function(result){
    var html="";
    $('#TableListapersona').DataTable().destroy();

    $.each(result.data,function(index,r){
        estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(1,'+r.id+')" class="btn btn-danger">Inactivo</span>';
        if(r.estado==1){
            estadohtml='<span id="'+r.id+'" onClick="CambiarEstado(0,'+r.id+')" class="btn btn-success">Activo</span>';
        }

        html+="<tr id='trid_"+r.id+"'>"+
            "<td class='paterno'>"+r.paterno+"</td>"+
            "<td class='materno'>"+r.materno+"</td>"+
            "<td class='nombre'>"+r.nombre+"</td>"+
            "<td class='dni'>"+r.dni+"</td>"+
            '<td><span class="btn btn-primary btn-sm" onClick="SeleccionarPersona(0,'+r.id+')"><i class="glyphicon glyphicon-ok"></i></span></td>';

        html+="</tr>";
    });
    $("#TableListapersona tbody").html(html); 
    $("#TableListapersona").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
};
</script>
