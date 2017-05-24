<script type="text/javascript">
var my_skinsG = [
    "skin-blue",
    "skin-black",
    "skin-red",
    "skin-yellow",
    "skin-purple",
    "skin-green",
    "skin-blue-light",
    "skin-black-light",
    "skin-red-light",
    "skin-yellow-light",
    "skin-purple-light",
    "skin-green-light"
];

var skins_listG = $("<ul />", {"class": 'list-unstyled clearfix'});
  //Dark sidebar skins
var skin_blueG =
  $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
      .append("<a href='javascript:void(0);' data-skin='skin-blue' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
      + "<div><span style='display:block; width: 20%; float: left; height: 7px; background: #367fa9;'></span><span class='bg-light-blue' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
      + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
      + "</a>"
      + "<p class='text-center no-margin'>Blue</p>");
skins_listG.append(skin_blueG);
var skin_blackG =
  $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
      .append("<a href='javascript:void(0);' data-skin='skin-black' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
      + "<div style='box-shadow: 0 0 2px rgba(0,0,0,0.1)' class='clearfix'><span style='display:block; width: 20%; float: left; height: 7px; background: #fefefe;'></span><span style='display:block; width: 80%; float: left; height: 7px; background: #fefefe;'></span></div>"
      + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #222;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
      + "</a>"
      + "<p class='text-center no-margin'>Black</p>");
skins_listG.append(skin_blackG);
var skin_purpleG =
  $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
      .append("<a href='javascript:void(0);' data-skin='skin-purple' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
      + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-purple-active'></span><span class='bg-purple' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
      + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
      + "</a>"
      + "<p class='text-center no-margin'>Purple</p>");
skins_listG.append(skin_purpleG);
var skin_greenG =
  $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
      .append("<a href='javascript:void(0);' data-skin='skin-green' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
      + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-green-active'></span><span class='bg-green' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
      + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
      + "</a>"
      + "<p class='text-center no-margin'>Green</p>");
skins_listG.append(skin_greenG);
var skin_redG =
  $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
      .append("<a href='javascript:void(0);' data-skin='skin-red' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
      + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-red-active'></span><span class='bg-red' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
      + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
      + "</a>"
      + "<p class='text-center no-margin'>Red</p>");
skins_listG.append(skin_redG);
var skin_yellowG =
  $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
      .append("<a href='javascript:void(0);' data-skin='skin-yellow' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
      + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-yellow-active'></span><span class='bg-yellow' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
      + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #222d32;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
      + "</a>"
      + "<p class='text-center no-margin'>Yellow</p>");
skins_listG.append(skin_yellowG);
//Light sidebar skins
var skin_blue_lightG =
  $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
      .append("<a href='javascript:void(0);' data-skin='skin-blue-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
      + "<div><span style='display:block; width: 20%; float: left; height: 7px; background: #367fa9;'></span><span class='bg-light-blue' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
      + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
      + "</a>"
      + "<p class='text-center no-margin' style='font-size: 12px'>Blue Light</p>");
skins_listG.append(skin_blue_lightG);
var skin_black_lightG =
  $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
      .append("<a href='javascript:void(0);' data-skin='skin-black-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
      + "<div style='box-shadow: 0 0 2px rgba(0,0,0,0.1)' class='clearfix'><span style='display:block; width: 20%; float: left; height: 7px; background: #fefefe;'></span><span style='display:block; width: 80%; float: left; height: 7px; background: #fefefe;'></span></div>"
      + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
      + "</a>"
      + "<p class='text-center no-margin' style='font-size: 12px'>Black Light</p>");
skins_listG.append(skin_black_lightG);
var skin_purple_lightG =
  $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
      .append("<a href='javascript:void(0);' data-skin='skin-purple-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
      + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-purple-active'></span><span class='bg-purple' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
      + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
      + "</a>"
      + "<p class='text-center no-margin' style='font-size: 12px'>Purple Light</p>");
skins_listG.append(skin_purple_lightG);
var skin_green_lightG =
  $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
      .append("<a href='javascript:void(0);' data-skin='skin-green-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
      + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-green-active'></span><span class='bg-green' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
      + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
      + "</a>"
      + "<p class='text-center no-margin' style='font-size: 12px'>Green Light</p>");
skins_listG.append(skin_green_lightG);
var skin_red_lightG =
  $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
      .append("<a href='javascript:void(0);' data-skin='skin-red-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
      + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-red-active'></span><span class='bg-red' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
      + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
      + "</a>"
      + "<p class='text-center no-margin' style='font-size: 12px'>Red Light</p>");
skins_listG.append(skin_red_lightG);
var skin_yellow_lightG =
  $("<li />", {style: "float:left; width: 33.33333%; padding: 5px;"})
      .append("<a href='javascript:void(0);' data-skin='skin-yellow-light' style='display: block; box-shadow: 0 0 3px rgba(0,0,0,0.4)' class='clearfix full-opacity-hover'>"
      + "<div><span style='display:block; width: 20%; float: left; height: 7px;' class='bg-yellow-active'></span><span class='bg-yellow' style='display:block; width: 80%; float: left; height: 7px;'></span></div>"
      + "<div><span style='display:block; width: 20%; float: left; height: 20px; background: #f9fafc;'></span><span style='display:block; width: 80%; float: left; height: 20px; background: #f4f5f7;'></span></div>"
      + "</a>"
      + "<p class='text-center no-margin' style='font-size: 12px;'>Yellow Light</p>");
skins_listG.append(skin_yellow_lightG);

$(document).ready(function() {
    var tmp = masterG.get('skin');
    if (tmp && $.inArray(tmp, my_skinsG))
        masterG.change_skin(tmp);

    $.AdminLTE.pushMenu.expandOnHover();
    $("#tema-body").after(skins_listG);
    
    $("[data-skin]").on('click', function (e) {
      if($(this).hasClass('knob'))
        return;
      e.preventDefault();
      masterG.change_skin($(this).data('skin'));
    });

    $('ul.sidebar-menu>li').each(function(indice, elemento) {
        htm=$(elemento).html();
        if(htm.split('<a href="<?php echo $valida_ruta_url; ?>"').length>1){
            $(elemento).addClass('active').addClass('menu-open');
            $(elemento).find('li').each(function(ind,ele) {
              htm=$(ele).html();
              if(htm.split('<a href="<?php echo $valida_ruta_url; ?>"').length>1){
                $(ele).addClass('active');
              }
            });
        }

        if( "<?php echo $valida_ruta_url; ?>"=="secureaccess.inicio" ){
          msjG.mensaje('success','Bienvenido',3000);
        }
    });
});

$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

var masterG ={
    change_skin:function(cls) {
        $.each(my_skinsG, function (i) {
          $("body").removeClass(my_skinsG[i]);
        });

        $("body").addClass(cls);
        masterG.store('skin', cls);
        return false;
    },
    store:function(name, val) {
        if (typeof (Storage) !== "undefined") {
            localStorage.setItem(name, val);
        } else {
            window.alert('Please use a modern browser to properly view this template!');
        }
    },
    get:function(name) {
        if (typeof (Storage) !== "undefined") {
            return localStorage.getItem(name);
        } else {
            window.alert('Please use a modern browser to properly view this template!');
        }
    },
    postAjax:function(url,data,eventsucces,eventbefore){
      $.ajax({
            url         : url,
            type        : 'POST',
            cache       : false,
            dataType    : 'json',
            data        : data,
            beforeSend : function() {
                $(".content.box").append('<div class="overlay"><i class="fa fa-refresh fa-spin"></i></div>');
                if( typeof eventbefore!= 'undefined' ){
                  eventbefore();
                }
            },
            success : function(r) {
                $(".content.box.overlay").remove();
                if( typeof eventsucces!= 'undefined' ){
                  eventsucces(r);
                }
            },
            error: function(){
                $(".content.box.overlay").remove();
                msjG.mensaje('danger','',3000);
            }
        });
    },
    CargarPaginacion:function(result,id){
        var html='<ul class="pagination">';
        if( result.current_page==1 ){
            html+=  '<li class="paginate_button previous disabled">'+
                        '<a>Atras</a>'+
                    '</li>';
        }
        else{
            html+=  '<li class="paginate_button previous" onClick="AjaxCargo.Cargar(HTMLCargarCargo,'+(result.current_page-1)+');">'+
                        '<a>Atras</a>'+
                    '</li>';
        }
        var ini=1; var fin=result.last_page;
        if( result.last_page>5 ){
            if( result.last_page-3<=result.current_page ){
                ini=result.last_page-4;
            }
            else if( result.current_page<5 ){
                fin=5;
            }
            else{
                ini=result.current_page-1;
                fin=result.current_page+1;
            }
        }

        if( (ini>1 && result.current_page>4) || (result.last_page-3<=result.current_page && result.current_page<=4 && ini>1) ){
            html+=  '<li class="paginate_button" onClick="AjaxCargo.Cargar(HTMLCargarCargo,1);">'+
                        '<a>1</a>'+
                    '</li>';
            html+=  '<li class="paginate_button disabled"><a>…</a></li>';
        }
        for(i=ini; i<=fin; i++){
            if( i==result.current_page ){
                html+=  '<li class="paginate_button active">'+
                            '<a>'+i+'</a>'+
                        '</li>';
            }
            else{
                html+=  '<li class="paginate_button" onClick="AjaxCargo.Cargar(HTMLCargarCargo,'+i+');">'+
                            '<a>'+i+'</a>'+
                        '</li>';
            }
        }
        if( fin>=5 && result.last_page>5 && result.last_page-3>result.current_page){
            html+=  '<li class="paginate_button disabled"><a>…</a></li>';
            html+=  '<li class="paginate_button" onClick="AjaxCargo.Cargar(HTMLCargarCargo,'+result.last_page+');">'+
                        '<a>'+result.last_page+'</a>'+
                    '</li>';
        }

        if( result.current_page==result.last_page ){
            html+=  '<li class="paginate_button next disabled">'+
                        '<a>Siguiente</a>'+
                    '</li>';
        }
        else{
            html+=  '<li class="paginate_button next" onClick="AjaxCargo.Cargar(HTMLCargarCargo,'+(result.current_page*1+1)+');">'+
                        '<a>Siguiente</a>'+
                    '</li>';
        }
        html+='</ul>';

        $(id).append(html);
    },
    enterGlobal:function(e,etiqueta,selecciona){
        tecla = (document.all) ? e.keyCode : e.which; // 2
        if (tecla==13){
            e.preventDefault();
            $(etiqueta).click(); 
            if( typeof(selecciona)!='undefined' ){
                $(etiqueta).focus(); 
            }
        }
    }
}

var msjG = {
    mensaje: function (tipo, texto, tiempo) {
      var img=tipo;
        if(tipo=="success"){
          img="check";
        }
        else if(tipo=="danger"){
          img="ban";
        }
        if (tipo == 'danger' && texto.length == 0) {
            texto = 'Ocurrio una interrupción en el proceso, favor de intentar nuevamente.';
        }
        etiqueta='msjG';
        $('.'+etiqueta).html('<div class="alert alert-dismissable alert-' + tipo + '">' +
                '<button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>' +
                '<h4><i class="icon fa fa-'+img+'"> '+texto+'</h4>'+
                '</div>');
        $('.'+etiqueta).slideToggle(2000);
        $('.'+etiqueta).fadeOut(tiempo);
    },
}

</script>
