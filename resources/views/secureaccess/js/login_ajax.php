<script type="text/javascript">
var AjaxLogin={
    IniciarLogin:function(evento){
        var datos=$("#logForm").serialize();
        var url='AjaxDinamic/SecureAccess.Persona@Login';
        masterG.postAjax(url,datos,evento);
    }
}
</script>
