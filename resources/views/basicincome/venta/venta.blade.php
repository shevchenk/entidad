@extends('layout.master')  

@section('include')
    @parent
    {{ Html::style('lib/datatables/dataTables.bootstrap.css') }}
    {{ Html::script('lib/datatables/jquery.dataTables.min.js') }}
    {{ Html::script('lib/datatables/dataTables.bootstrap.min.js') }}

    {{ Html::style('lib/bootstrap-select/dist/css/bootstrap-select.min.css') }}
    {{ Html::script('lib/bootstrap-select/dist/js/bootstrap-select.min.js') }}
    {{ Html::script('lib/bootstrap-select/dist/js/i18n/defaults-es_ES.min.js') }}

    @include( 'basicincome.venta.js.venta_ajax' )

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
                                <div class="panel-heading"><center>Registrar Venta</center></div>

                                <div class="panel-body"> <!-- INICIO PANEL BODY-->
                                    
                                    <div class="col-md-5">
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
                                
                                  
                                    <div class="col-md-5">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Categoria</label>
                                            <select  class="form-control selectpicker show-menu-arrow" data-live-search="true" id="slct_categoria_id" name="slct_categoria_id">
                                                <option value="0">.::Seleccione::.</option>
                                            </select>
                                        </div> 
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label>Articulo</label>
                                            <select  class="form-control selectpicker show-menu-arrow" data-live-search="true" id="slct_articulo_id" name="slct_articulo_id">
                                                <option value="0">.::Seleccione::.</option>
                                            </select>
                                        </div> 
                                    </div>
                                
                                    
                                   
                                </div><!-- FIN PANEL BODY-->

                            </div> <!-- FIN PANEL PRIMARY-->
                        </div> <!-- FIN COLD MD 12-->

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
     @include( 'basicincome.venta.form.venta' )
@stop
