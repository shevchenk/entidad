<script type="text/javascript">
var LPtextoIdCliente='';
var LPtextoCliente='';
var LPfiltrosG='';
$(document).ready(function() {
    $("#TableListacliente").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": false,
        "info": true,
        "autoWidth": false
    });
   
    $('#ModalListacliente').on('shown.bs.modal', function (event) { 
      var button = $(event.relatedTarget); // captura al boton
      bfiltros= button.data('filtros');
      if( typeof (bfiltros)!='undefined'){
          LPfiltrosG=bfiltros;
      }
      AjaxListacliente.Cargar(HTMLCargarClienteListaCliente);
      
      LPtextoIdCliente= button.data('personaid');
      LPtextoCliente= button.data('persona');
      
    });

    $('#ModalListacliente').on('hidden.bs.modal', function (event) {
        LPfiltrosG='';
//        $("ModalPersonaForm input[type='hidden']").remove();
    });
});

//SELECCIONA EL CLIENTE QUE APARECE EN LA LISTA DE LISTA CLIENTE
SeleccionarCliente = function(val,id){
    $("#"+LPtextoCliente).val('');
    $("#"+LPtextoIdCliente).val('');
    if( val==0 ){
        var paterno=$("#TableListacliente #trid_"+id+" .paterno").text();
        var materno=$("#TableListacliente #trid_"+id+" .materno").text();
        var nombre=$("#TableListacliente #trid_"+id+" .nombre").text();
        $("#"+LPtextoCliente).val(paterno+" "+materno+" "+nombre);
        $("#"+LPtextoIdCliente).val(id);
        $('.persona').css("display","");
        $('#ModalListacliente').modal('hide');
    }
    }
//*****************************************************************
    
//CARGA LOS DATOS PARA LA LISTA DE LISTA CLIENTE
HTMLCargarClienteListaCliente=function(result){
    var html="";
    $('#TableListacliente').DataTable().destroy();

    $.each(result.data,function(index,r){
        html+="<tr id='trid_"+r.id+"'>"+
            "<td class='paterno'>"+r.paterno+"</td>"+
            "<td class='materno'>"+r.materno+"</td>"+
            "<td class='nombre'>"+r.nombre+"</td>"+
            "<td class='dni'>"+r.dni+"</td>"+
           '<td><span class="btn btn-primary btn-sm" onClick="SeleccionarCliente(0,'+r.id+')"+><i class="glyphicon glyphicon-ok"></i></span>'+
                        "<input type='hidden' class='email' value='"+r.email+"'>"+
            "<input type='hidden' class='fecha_nacimiento' value='"+r.fecha_nacimiento+"'>"+
            "<input type='hidden' class='sexo' value='"+r.sexo+"'>"+
            "<input type='hidden' class='telefono' value='"+r.telefono+"'>"+
            "<input type='hidden' class='celular' value='"+r.celular+"'>"+
             "<input type='hidden' class='estado' value='"+r.estado+"'>";
            /* ESTO HACE QUE SE MUESTRE EL BOTON EDITAR EN LA LSITA
            "</td>"+
            '<td><a class="btn btn-primary btn-sm" onClick="AgregarEditarNuevoListaCliente(0,'+r.id+')"><i class="fa fa-edit fa-lg"></i> </a></td>';
            */

        html+="</tr>";
    });
    $("#TableListacliente tbody").html(html); 
    $("#TableListacliente").DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
};
//***********************************************************************
</script>
