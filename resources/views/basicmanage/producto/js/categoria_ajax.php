<script type="text/javascript">
var AjaxCategoria={
    AgregarEditar:function(evento){
        var data=$("#ModalCategoriaForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/ExpertManage.Categoria@New';
        if(AddEdit==0){
            url='AjaxDinamic/ExpertManage.Categoria@Edit';
        }
        masterG.postAjax(url,data,evento);
    },
    Cargar:function(evento,pag){
        if( typeof(pag)!='undefined' ){
            $("#CategoriaForm").append("<input type='hidden' value='"+pag+"' name='page'>");
        }
        data=$("#CategoriaForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#CategoriaForm input[type='hidden']").remove();
        url='AjaxDinamic/ExpertManage.Categoria@Load';
        masterG.postAjax(url,data,evento);
    },
    CambiarEstado:function(evento,AI,id){
        $("#ModalCategoriaForm").append("<input type='hidden' value='"+AI+"' name='estadof'>");
        $("#ModalCategoriaForm").append("<input type='hidden' value='"+id+"' name='id'>");
        var data=$("#ModalCategoriaForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ModalCategoriaForm input[type='hidden']").remove();
        url='AjaxDinamic/ExpertManage.Categoria@EditStatus';
        masterG.postAjax(url,data,evento);
    }
};
</script>
