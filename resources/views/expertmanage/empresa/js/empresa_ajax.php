<script type="text/javascript">
var AjaxEmpresa={
    AgregarEditar:function(evento){
        var data=$("#ModalEmpresaForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/ExpertManage.Empresa@New';
        if(AddEdit==0){
            url='AjaxDinamic/ExpertManage.Empresa@Edit';
        }
        masterG.postAjax(url,data,evento);
    },
    Cargar:function(evento,pag){
        if( typeof(pag)!='undefined' ){
            $("#EmpresaForm").append("<input type='hidden' value='"+pag+"' name='page'>");
        }
        data=$("#EmpresaForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#EmpresaForm input[type='hidden']").remove();
        url='AjaxDinamic/ExpertManage.Empresa@Load';
        masterG.postAjax(url,data,evento);
    },
    CambiarEstado:function(evento,AI,id){
        $("#ModalEmpresaForm").append("<input type='hidden' value='"+AI+"' name='estadof'>");
        $("#ModalEmpresaForm").append("<input type='hidden' value='"+id+"' name='id'>");
        var data=$("#ModalEmpresaForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ModalEmpresaForm input[type='hidden']").remove();
        url='AjaxDinamic/ExpertManage.Empresa@EditStatus';
        masterG.postAjax(url,data,evento);
    }
};
</script>
