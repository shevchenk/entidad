<script type="text/javascript">
var AjaxSucursal={
    AgregarEditar:function(evento){
        var data=$("#ModalSucursalForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/ExpertManage.Sucursal@New';
        if(AddEdit==0){
            url='AjaxDinamic/ExpertManage.Sucursal@Edit';
        }
        masterG.postAjax(url,data,evento);
    },
    Cargar:function(evento,pag){
        if( typeof(pag)!='undefined' ){
            $("#SucursalForm").append("<input type='hidden' value='"+pag+"' name='page'>");
        }
        data=$("#SucursalForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#SucursalForm input[type='hidden']").remove();
        url='AjaxDinamic/ExpertManage.Sucursal@Load';
        masterG.postAjax(url,data,evento);
    },
    CambiarEstado:function(evento,AI,id){
        $("#ModalSucursalForm").append("<input type='hidden' value='"+AI+"' name='estadof'>");
        $("#ModalSucursalForm").append("<input type='hidden' value='"+id+"' name='id'>");
        var data=$("#ModalSucursalForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ModalSucursalForm input[type='hidden']").remove();
        url='AjaxDinamic/ExpertManage.Sucursal@EditStatus';
        masterG.postAjax(url,data,evento);
    }
};
</script>
