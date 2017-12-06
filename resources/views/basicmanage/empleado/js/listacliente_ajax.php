<script type="text/javascript">
var AjaxListacliente={
    Cargar:function(evento){
        if( LPfiltrosG!='' ){
          filtros=LPfiltrosG;
          dfiltros=filtros.split("|");
          for(i=0;i<dfiltros.length;i++){
              $("#ListaclienteForm").append("<input type='hidden' value='"+dfiltros[i].split(":")[1]+"' name='"+dfiltros[i].split(":")[0]+"'>");
          }
        }
        data=$("#ListaclienteForm").serialize().split("txt_").join("").split("slct_").join("");
        $("#ListaclienteForm input[type='hidden']").not('.mant').remove();
        url='AjaxDinamic/BasicManage.ClienteBM@Load';
        masterG.postAjax(url,data,evento);
    }
};
</script>
