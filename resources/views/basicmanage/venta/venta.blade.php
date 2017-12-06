@extends('layout.master')  

@section('include')
    @parent
    {{ Html::style('lib/datatables/dataTables.bootstrap.css') }}
    {{ Html::script('lib/datatables/jquery.dataTables.min.js') }}
    {{ Html::script('lib/datatables/dataTables.bootstrap.min.js') }}

    {{ Html::style('lib/bootstrap-select/dist/css/bootstrap-select.min.css') }}
    {{ Html::script('lib/bootstrap-select/dist/js/bootstrap-select.min.js') }}
    {{ Html::script('lib/bootstrap-select/dist/js/i18n/defaults-es_ES.min.js') }}
 
    @include( 'basicmanage.venta.js.venta_ajax' )
    @include( 'basicmanage.venta.js.venta' )
    @include( 'basicmanage.empleado.js.listapersona_ajax' )
    @include( 'basicmanage.empleado.js.listapersona' )

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
                    <form id="ModalMatriculaForm">

                    <div class="col-md-12"> <!-- INICIO COLD MD 12-->
                            <div class="panel panel-primary"> <!-- INICIO PANEL PRIMARY-->
                                <div class="panel-heading"><center>Registrar Venta</center></div>  <!-- SOLO ES EL NOMBRE CON LA SOMBRA-->
                                <div class="panel-body"> <!-- INICIO PANEL BODY-->

                            <div class="col-md-3"> <!-- INICIO COLD MD 12-->
                                <div class="panel panel-primary"> <!-- INICIO PANEL PRIMARY-->                                   
                                    <div class="panel-body"> <!-- INICIO PANEL BODY-->

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Categoria</label>
                                                <select  class="form-control selectpicker show-menu-arrow" data-live-search="true" id="slct_categoria_id" name="slct_categoria_id">
                                                    <option value="0">.::Seleccione::.</option>
                                                </select>
                                            </div> 
                                        </div>

                                        

                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label>Articulo</label>
                                                <select  class="form-control selectpicker show-menu-arrow" data-live-search="true" id="slct_articulo_id" name="slct_articulo_id">
                                                    <option value="0">.::Seleccione::.</option>
                                                </select>
                                            </div> 
                                        </div>                                  
                                    </div> <!-- FIN PANEL BODY-->    
                                </div> <!-- FIN PANEL PRIMARY-->           
                            </div> <!-- FIN COLD MD 12-->        
                             

                            <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Resp. de la Venta</label>
                                                <input type="hidden" name="txt_responsable_id" id="txt_responsable_id" class="form-control mant" readonly="">
                                                <input type="text" class="form-control mant" id="txt_responsable" name="txt_responsable" disabled="">
                                            </div> 
                                        </div>

                                        <div class="col-md-2">
                                            <div class="form-group">
                                                <label>Fecha</label>
                                                <input type="hidden" class="form-control mant" id="txt_tipo_matricula" name="txt_tipo_matricula" readOnly="" value="1">
                                                <input type="text" class="form-control mant" id="txt_fecha" name="txt_fecha" readOnly="">
                                            </div> 
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <label>Cliente</label>
                                                <input type="hidden" name="txt_persona_id" id="txt_persona_id" class="form-control" readonly="">
                                                <input type="text" class="form-control" id="txt_persona" name="txt_persona" disabled="">
                                            </div> 
                                        </div>
                                        <div class="col-md-1">
                                            <div class="form-group">
                                                <label>&nbsp;&nbsp;&nbsp;</label>
                                                <span class="input-group-btn">
                                                    <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#ModalListapersona" data-filtros="estado:1" data-personaid="ModalMatriculaForm #txt_persona_id"  data-persona="ModalMatriculaForm #txt_persona"   data-buscaralumno="1">Buscar Persona</button> <!-- data-dni="ModalMatriculaForm #txt_dni" -->
                                                </span>
                                            </div> 
                                        </div>            
                                    
                            <div class="col-md-9">
                                <div class="panel panel-primary"> <!-- INICIO PANEL PRIMARY-->    
                                    <div class="panel-body"> <!-- INICIO PANEL BODY-->   
                                        <div class="col-md-12">
                                            <table class="table" id="t_pago_matricula">
                                                <thead> 
                                                    
                                                    <tr>
                                                        <th>Cantidad</th>
                                                        <th>Precio</th>
                                                        <th>Producto</th>
                                                        <th>Imagen</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                </thead>
                                                
                                            </table>
                                        </div>

                                        
                                        <div class="col-md-12">                                            
                                                 
                                                <div class="col-md-10 text-right">
                                                     <label>SubTotal:</label>                                                   
                                                </div>
                                                <div class="col-md-2 text-right">                                                   
                                                    <input type="text" class="form-control" id="txt_nro_promocion" name="txt_nro_promocion" placeholder="Nro" disabled>
                                                </div>

                                                    <div class="col-md-12"> 
                                                        &nbsp;
                                                    </div>

                                                <div class="col-md-10 text-right">
                                                    <label>IGV:</label>                                                   
                                                </div>
                                                <div class="col-md-2 text-right">                                               
                                                    <input type="text" class="form-control" id="txt_nro_promocion" name="txt_nro_promocion" placeholder="Nro" disabled>
                                                </div>

                                                    <div class="col-md-12"> 
                                                        &nbsp;
                                                    </div>

                                                <div class="col-md-10 text-right">
                                                    <label>Promocion:</label>                                                   
                                                </div>
                                                <div class="col-md-2 text-right">                                                    
                                                    <input type="text" class="form-control" id="txt_nro_promocion" name="txt_nro_promocion" placeholder="Nro" disabled>
                                                </div>

                                                    <div class="col-md-12"> 
                                                        &nbsp;
                                                    </div>

                                                <div class="col-md-10 text-right">
                                                    <label>Total:</label>                                                    
                                                </div>
                                                <div class="col-md-2 text-right">                                                    
                                                    <input type="text" class="form-control" id="txt_monto_promocion" name="txt_monto_promocion" placeholder="Monto" disabled>
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
     @include( 'basicmanage.venta.form.venta' )
     @include( 'basicmanage.empleado.form.listapersona' )
     @include( 'basicmanage.persona.form.persona' )
@stop
