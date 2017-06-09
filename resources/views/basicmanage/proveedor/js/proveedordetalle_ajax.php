<script type="text/javascript">
var AjaxProveedorDetalle={
    AgregarEditar:function(evento){
        var data=$("#ModalProveedorDetalleForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/BasicManage.ProveedorDetalleBM@New';
        if(AddEdit==0){
            url='AjaxDinamic/BasicManage.ProveedorDetalleBM@Edit';
        }
        masterG.postAjax(url,data,evento);
    },
    Cargar:function(evento,id){
        data={'id':id};
        var data=$("#ModalProveedorDetalleForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ProveedorDetalleForm input[type='hidden']").not('.mant').remove();
        url='AjaxDinamic/BasicManage.ProveedorDetalleBM@Load';
        masterG.postAjax(url,data,evento);
    },
    CambiarEstado:function(evento,AI,id){
        $("#ModalProveedorDetalleForm").append("<input type='hidden' value='"+AI+"' name='estadof'>");
        $("#ModalProveedorDetalleForm").append("<input type='hidden' value='"+id+"' name='id'>");
        var data=$("#ModalProveedorDetalleForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ModalProveedorDetalleForm input[type='hidden']").not('.mant').remove();
        url='AjaxDinamic/BasicManage.ProveedorDetalleBM@EditStatus';
        masterG.postAjax(url,data,evento);
    }
};
</script>
