<script type="text/javascript">
var AjaxProducto={
    AgregarEditar:function(evento){
        var data=$("#ModalProductoForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/BasicManage.ProductoBM@New';
        if(AddEdit==0){
            url='AjaxDinamic/BasicManage.ProductoBM@Edit';
        }
        masterG.postAjax(url,data,evento);
    },
    Cargar:function(evento,pag){
        if( typeof(pag)!='undefined' ){
            $("#ProductoForm").append("<input type='hidden' value='"+pag+"' name='page'>");
        }
        data=$("#ProductoForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ProductoForm input[type='hidden']").remove();
        url='AjaxDinamic/BasicManage.ProductoBM@Load';
        masterG.postAjax(url,data,evento);
    },
    CambiarEstado:function(evento,AI,id){
        $("#ModalProductoForm").append("<input type='hidden' value='"+AI+"' name='estadof'>");
        $("#ModalProductoForm").append("<input type='hidden' value='"+id+"' name='id'>");
        var data=$("#ModalProductoForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ModalProductoForm input[type='hidden']").remove();
        url='AjaxDinamic/BasicManage.ProductoBM@EditStatus';
        masterG.postAjax(url,data,evento);
    },
    CargarSucursal:function(evento){
        url='AjaxDinamic/BasicManage.ProductoBM@ListSucursal';
        data={};
        masterG.postAjax(url,data,evento);
    },
    CargarCategoria:function(evento){
        url='AjaxDinamic/BasicManage.ProductoBM@ListCategoria';
        data={};
        masterG.postAjax(url,data,evento);
    },
    CargarArticulo:function(evento){
        url='AjaxDinamic/BasicManage.ProductoBM@ListArticulo';
        data={};
        masterG.postAjax(url,data,evento);
    }
};
</script>
