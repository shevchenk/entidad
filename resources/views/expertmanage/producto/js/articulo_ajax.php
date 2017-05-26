<script type="text/javascript">
var AjaxArticulo={
    AgregarEditar:function(evento){
        var data=$("#ModalArticuloForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/ExpertManage.Articulo@New';
        if(AddEdit==0){
            url='AjaxDinamic/ExpertManage.Articulo@Edit';
        }
        masterG.postAjax(url,data,evento);
    },
    Cargar:function(evento,pag){
        if( typeof(pag)!='undefined' ){
            $("#ArticuloForm").append("<input type='hidden' value='"+pag+"' name='page'>");
        }
        data=$("#ArticuloForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ArticuloForm input[type='hidden']").remove();
        url='AjaxDinamic/ExpertManage.Articulo@Load';
        masterG.postAjax(url,data,evento);
    },
    CambiarEstado:function(evento,AI,id){
        $("#ModalArticuloForm").append("<input type='hidden' value='"+AI+"' name='estadof'>");
        $("#ModalArticuloForm").append("<input type='hidden' value='"+id+"' name='id'>");
        var data=$("#ModalArticuloForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ModalArticuloForm input[type='hidden']").remove();
        url='AjaxDinamic/ExpertManage.Articulo@EditStatus';
        masterG.postAjax(url,data,evento);
    }
};
</script>
