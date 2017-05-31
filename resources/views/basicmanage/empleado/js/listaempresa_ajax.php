<script type="text/javascript">
var AjaxListaempresa={
    Cargar:function(evento,pag){
        if( typeof(pag)!='undefined' ){
            $("#ListaempresaForm").append("<input type='hidden' value='"+pag+"' name='page'>");
        }
        data=$("#ListaempresaForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ListaempresaForm input[type='hidden']").remove();
        url='AjaxDinamic/BasicManage.EmpresaBM@Load';
        masterG.postAjax(url,data,evento);
    }
};
</script>
