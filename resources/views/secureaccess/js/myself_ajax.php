<script type="text/javascript">
var MyselfAjax={
    Editar:function(evento){
        var data=$("#MyselfForm").serialize().split("txt_").join("").split("slct_").join("");
        url='AjaxDinamic/SecureAccess.Persona@EditPassword';
        masterG.postAjax(url,data,evento);
    }
};
</script>
