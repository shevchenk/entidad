<script type="text/javascript">
var AjaxVenta={
    AgregarEditar:function(evento){
        var data=$("#ModalVentaForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/BasicIncome.VentaBM@New';
        if(AddEdit==0){
            url='AjaxDinamic/BasicIncome.VentaBM@Edit';
        }
        masterG.postAjax(url,data,evento);
    },
    Cargar:function(evento){
        url='AjaxDinamic/BasicIncome.VentaBM@Load';
        data={};
        masterG.postAjax(url,data,evento);
    },
    CambiarEstado:function(evento,AI,id){
        $("#ModalVentaForm").append("<input type='hidden' value='"+AI+"' name='estadof'>");
        $("#ModalVentaForm").append("<input type='hidden' value='"+id+"' name='id'>");
        var data=$("#ModalVentaForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ModalVentaForm input[type='hidden']").not('.mant').remove();
        url='AjaxDinamic/BasicIncome.VentaBM@EditStatus';
        masterG.postAjax(url,data,evento);
    }
    
};
</script>
