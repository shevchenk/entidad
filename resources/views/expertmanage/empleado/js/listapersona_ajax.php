<script type="text/javascript">
var AjaxListapersona={
    Cargar:function(evento,pag){
        if( typeof(pag)!='undefined' ){
            $("#ListapersonaForm").append("<input type='hidden' value='"+pag+"' name='page'>");
        }
        data=$("#ListapersonaForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ListapersonaForm input[type='hidden']").remove();
        url='AjaxDinamic/ExpertManage.PersonaEM@Load';
        masterG.postAjax(url,data,evento);
    }
};
</script>
