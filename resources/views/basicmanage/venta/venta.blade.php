@extends('layout.master')  

@section('include')
    @parent
    {{ Html::style('lib/datatables/dataTables.bootstrap.css') }}
    {{ Html::script('lib/datatables/jquery.dataTables.min.js') }}
    {{ Html::script('lib/datatables/dataTables.bootstrap.min.js') }}

    {{ Html::style('lib/bootstrap-select/dist/css/bootstrap-select.min.css') }}
    {{ Html::script('lib/bootstrap-select/dist/js/bootstrap-select.min.js') }}
    {{ Html::script('lib/bootstrap-select/dist/js/i18n/defaults-es_ES.min.js') }}

    {{ Html::style('lib/bootstrap-datetimepicker/css/bootstrap-datetimepicker.min.css') }}
    {{ Html::script('lib/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js') }}
    {{ Html::script('lib/bootstrap-datetimepicker/js/locales/bootstrap-datetimepicker.es.js') }}
 
    <!--ESTA DECLARACION SIRVE PARA QUE RECONOSCA LAS FUNCIONES Q TIENE LA VENTA-->
    @include( 'basicmanage.venta.js.venta_ajax' )
    @include( 'basicmanage.venta.js.venta' )
    <!--***********************************************-->

    <!--ESTA DECLARACION SIRVE PARA QUE RECONOSCA LAS FUNCIONES Q TIENE LA LISTA CLIENTE-->
    @include( 'basicmanage.empleado.js.listacliente_ajax' )
    @include( 'basicmanage.empleado.js.listacliente' )
    <!--***********************************************-->

    @include( 'basicmanage.empleado.js.listaempresa_ajax' )
    @include( 'basicmanage.empleado.js.listaempresa' )
    @include( 'basicmanage.empresa.js.agregar_editar_empresa_ajax' )
    @include( 'basicmanage.empresa.js.agregar_editar_empresa' )
    <!--***********************************************-->

    @include( 'basicmanage.empleado.js.listapersona_ajax' )
    @include( 'basicmanage.empleado.js.listapersona' )
    @include( 'basicmanage.persona.js.agregar_editar_persona_ajax' )
    @include( 'basicmanage.persona.js.agregar_editar_persona' )
    <!--***********************************************-->

    <!--ESTA DECLARACION SIRVE PARA QUE RECONOSCA LAS FUNCIONES Q TIENE LA LSITA PRODUCTO-->
    @include( 'basicmanage.producto.js.listaproducto_ajax' )
    @include( 'basicmanage.producto.js.listaproducto' )
    <!--***********************************************-->

    <!--ESTA DECLARACION SIRVE PARA QUE RECONOSCA LAS FUNCIONES Q TIENE CLIENTE-->
    @include( 'basicmanage.cliente.js.cliente_ajax' )
    @include( 'basicmanage.cliente.js.cliente' )
    <!--***********************************************-->


@stop

@section('content')
<style>
.modal { overflow: auto !important; 
</style>
<section class="content-header">
    <h1>Ingreso - Ventas
        <small>Ventas</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-sitemap"></i> Ventas</li>
        <li class="active">Ingreso - ventas</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Ventas</h3>
                </div>
                <div class="box-body with-border">
                    <form id="ModalVentaForm">

                    <div class="col-md-12"> <!-- INICIO COLD MD 12-->
                            <div class="panel panel-primary"> <!-- INICIO PANEL PRIMARY-->
                                <div class="panel-heading"><center>Registrar Venta</center></div>  <!-- SOLO ES EL NOMBRE CON LA SOMBRA-->
                                <div class="panel-body"> <!-- INICIO PANEL BODY-->

                            <div class="col-md-4"> <!-- INICIO COLD MD 12-->
                                <div class="panel panel-primary"> <!-- INICIO PANEL PRIMARY-->                                   
                                    <div class="panel-body"> <!-- INICIO PANEL BODY-->

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <select  class="form-control selectpicker show-menu-arrow" data-live-search="true" id="slct_categoria_id" name="slct_categoria_id">
                                                    <option value="0">.::Seleccione::.</option>
                                                </select>
                                            </div> 
                                        </div>                            

                                        

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label>Articulo</label>
                                                <select  class="form-control selectpicker show-menu-arrow" data-live-search="true" id="slct_articulo_id" name="slct_articulo_id">
                                                    <option value="0">.::Seleccione::.</option>
                                                </select>
                                            </div> 
                                        </div>   


                           
                                        <div class="col-md-12"> 
                                         <div class="box-body table-responsive no-padding">
                                            <table id="TableProducto" class="table table-bordered table-hover">
                                                <thead>
                                                    <tr class="cabecera">
                                                        <th>Img</th>
                                                        <th>Producto</th>
                                                        <th>[-]</th>
                                                    </tr>
                                                </thead>
                                                    <tbody id="lisproducto">
                                                    </tbody>
                                            </table>
                                         </div><!-- .box-body -->
                                        </div>

                                    </div> <!-- FIN PANEL BODY-->   

                                </div> <!-- FIN PANEL PRIMARY-->      

                            </div> <!-- FIN COLD MD 12-->       




                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Resp. de la Venta</label>
                                    <input class='form-control mant' type='hidden' id="txt_responsable_id" name="txt_responsable_id" value='<?php echo Auth::user()->id;  ?>'>
                                          
                                    <input class='form-control text-center' id='responsable' name='responsable' value='<?php echo Auth::user()->paterno.' '.Auth::user()->materno.' '.Auth::user()->nombre; ?>' readOnly=''>
                                </div> 
                            </div>

    

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Fecha</label>
                                    <input type="hidden" class="form-control mant" id="txt_venta" name="txt_venta" readOnly="">
                                    <input type="text" class="form-control mant" id="txt_fecha_inicio" name="txt_fecha_inicio" readOnly>
                                </div> 
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cliente</label>
                                    <input type="hidden" name="txt_cliente_id" id="txt_cliente_id" class="form-control" readonly="">
                                                <input type="text" class="form-control" id="txt_cliente" name="txt_cliente" disabled="">
                                </div> 
                            </div>
                                        
                            <div class="col-md-1">
                                <div class="form-group">
                                    <label>&nbsp;&nbsp;&nbsp;</label>
                                    <span class="input-group-btn">
                                        <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#ModalListacliente" data-filtros="estado:1" data-personaid="ModalVentaForm #txt_cliente_id"  data-persona="ModalVentaForm #txt_cliente">Buscar Cliente</button> <!-- data-dni="ModalVentaForm #txt_dni" -->
                                    </span>
                                </div> 
                            </div>            
                                    
                            <div class="col-md-8">
                                <div class="panel panel-primary"> <!-- INICIO PANEL PRIMARY-->    
                                    <div class="panel-body"> <!-- INICIO PANEL BODY-->   
                                        <div class="col-md-12">
                                            <table class="table" id="t_lista_venta">
                                                <thead> 
                                                    
                                                    <tr>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Producto</th>
                                                        <th>Imagen</th>
                                                        <th>Precio Total</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="tb_lista_venta">
                                            </table>
                                        </div>

                                        
                                <div class="col-md-12" id="detallePrecioVenta">                                            
                                                 
                                    <div class="col-md-10 text-right">
                                        <label>SubTotal:</label>                                          

                                    </div>

                                    <div class="col-md-2 text-right">                                                   
                                        <input type="text" class="form-control text-center" id="txt_subtotal" name="txt_subtotal"  disabled>
                                    </div>

                                    <div class="col-md-12"> 
                                        &nbsp;
                                    </div>

                                    <div class="col-md-10 text-right">
                                        <label>IGV:</label>                                                  
                                    </div>
                                                
                                    <div class="col-md-2 text-right">                                              
                                        <input type="text" class="form-control text-center" id="txt_IGV" name="txt_IGV"  disabled>
                                    </div>

                                    <div class="col-md-12"> 
                                        &nbsp;
                                    </div>

                                    <div class="col-md-10 text-right">
                                        <label>Promocion:</label>                                                  
                                    </div>
                                    
                                    <div class="col-md-2 text-right">                                                    
                                        <input type="text" class="form-control text-center" id="txt_nro_promocion" name="txt_nro_promocion" disabled>
                                    </div>

                                    <div class="col-md-12"> 
                                        &nbsp;
                                    </div>

                                    <div class="col-md-10 text-right">
                                        <label>Total:</label>                                                   
                                    </div>
                                    
                                    <div class="col-md-2 text-right">                                                    
                                        <input type="text" class="form-control text-center" id="txt_monto_total" name="txt_monto_total" disabled>
                                    </div>
                                            
                                </div>     
                                    </div><!-- FIN PANEL BODY-->    
                                </div> <!-- FIN PANEL PRIMARY-->  
                            </div><!-- FIN COLD MD 9-->

                        </div> <!-- FIN PANEL BODY-->    
                        </div> <!-- FIN PANEL PRIMARY-->                
                    </div><!-- FIN COLD MD 12-->    

                        <div class="form-group"> 
                            <label></label>
                        </div>



                    </form>
                </div>
                <div class="box-footer">
                  <button type="submit" class="btn btn-info pull-right" onclick="AgregarEditarAjax()">Guardar Venta</button>
                </div>
            </div><!-- .box -->
        </div><!-- .col -->
    </div><!-- .row -->
</section><!-- .content -->
@stop

@section('form')

     <!--ESTA DECLARACION SIRVE PARA QUE SE ABRA EL FORM DE VENTA-->
     @include( 'basicmanage.venta.form.venta' )
     <!--**********************************************************-->

     <!--ESTA DECLARACION SIRVE PARA QUE SE ABRA EL FORM DE LISTA CLIENTE-->
     @include( 'basicmanage.empleado.form.listacliente' )
     <!--**********************************************************-->

     <!--ESTA DECLARACION SIRVE PARA QUE SE ABRA EL FORM DE LISTA EMPRESA-->
     @include( 'basicmanage.empleado.form.listaempresa' )
     <!--**********************************************************-->

     <!--ESTA DECLARACION SIRVE PARA QUE SE ABRA EL FORM DE LISTA PERSONA-->
     @include( 'basicmanage.empleado.form.listapersona' )
     <!--**********************************************************-->

     <!--ESTA DECLARACION SIRVE PARA QUE SE ABRA EL FORM DE CLIENTE-->
     @include( 'basicmanage.cliente.form.cliente' )
     <!--**********************************************************-->

     <!--ESTA DECLARACION SIRVE PARA QUE SE ABRA EL FORM DE PERSONA-->
     @include( 'basicmanage.persona.form.persona' )
     <!--**********************************************************-->

     <!--ESTA DECLARACION SIRVE PARA QUE SE ABRA EL FORM DE PERSONA-->
     @include( 'basicmanage.empresa.form.empresa' )
     <!--**********************************************************-->

@stop

