<script type="text/javascript">
var AjaxVenta={
    AgregarEditar:function(evento){
        var data=$("#ModalVentaForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/BasicManage.VentaBM@New';
        if(AddEdit==0){
            url='AjaxDinamic/BasicManage.VentaBM@Edit';
        }
        masterG.postAjax(url,data,evento);
    },
    Cargar:function(evento){
        url='AjaxDinamic/BasicManage.VentaBM@Load';
        data={};
        masterG.postAjax(url,data,evento);
    },
    CambiarEstado:function(evento,AI,id){
        $("#ModalVentaForm").append("<input type='hidden' value='"+AI+"' name='estadof'>");
        $("#ModalVentaForm").append("<input type='hidden' value='"+id+"' name='id'>");
        var data=$("#ModalVentaForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ModalVentaForm input[type='hidden']").not('.mant').remove();
        url='AjaxDinamic/BasicManage.VentaBM@EditStatus';
        masterG.postAjax(url,data,evento);
    },

    FechaActual:function(evento){
       /* url='AjaxDinamic/BasicManage.VentaBM@postFechaactual';
        var data=$("#ModalVentaForm").serialize().split("txt_").join("").split("slct_").join("");
        masterG.postAjax(url,data,evento);*/


        $.ajax({
            url         : 'AjaxDinamic/BasicManage.VentaBM@postFechaactual',       
            type        : 'POST',
            cache       : false,
            async       : false,
            dataType    : 'json',
            data        : {estado:1},
            beforeSend : function() {
            },
            success : function(obj) {
                $("#txt_fecha_inicio").val(obj.fecha+' '+obj.hora);
                fechaTG=obj.fecha;
                horaTG=obj.hora;
                clearInterval(TiempoFinalTG);
                TiempoFinalTG='';
                evento();
            },
            error: function(){
            }
        });
    },

    CargarCategoria:function(evento){
        url='AjaxDinamic/BasicManage.CategoriaBM@ListCategoria';
        data={};
        masterG.postAjax(url,data,evento);
    },

    CargarArticulo:function(evento,categoria_id){
        url='AjaxDinamic/BasicManage.ArticuloBM@ListArticulo';
        data={categoria_id:categoria_id};
        masterG.postAjax(url,data,evento);
    }

  
};
</script>
