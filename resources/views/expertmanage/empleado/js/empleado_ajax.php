<script type="text/javascript">
var AjaxEmpleado={
    AgregarEditar:function(evento){
        var data=$("#ModalEmpleadoForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/ExpertManage.Empleado@New';
        if(AddEdit==0){
            url='AjaxDinamic/ExpertManage.Empleado@Edit';
        }
        masterG.postAjax(url,data,evento);
    },
    Cargar:function(evento,pag){
        if( typeof(pag)!='undefined' ){
            $("#EmpleadoForm").append("<input type='hidden' value='"+pag+"' name='page'>");
        }
        data=$("#EmpleadoForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#EmpleadoForm input[type='hidden']").remove();
        url='AjaxDinamic/ExpertManage.Empleado@Load';
        masterG.postAjax(url,data,evento);
    },
    CambiarEstado:function(evento,AI,id){
        $("#ModalEmpleadoForm").append("<input type='hidden' value='"+AI+"' name='estadof'>");
        $("#ModalEmpleadoForm").append("<input type='hidden' value='"+id+"' name='id'>");
        var data=$("#ModalEmpleadoForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ModalEmpleadoForm input[type='hidden']").remove();
        url='AjaxDinamic/ExpertManage.Empleado@EditStatus';
        masterG.postAjax(url,data,evento);
    }
};
</script>
