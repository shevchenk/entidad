@extends('layout.master')  

@section('include')
    @parent
    {{ Html::style('lib/datatables/dataTables.bootstrap.css') }}
    {{ Html::script('lib/datatables/jquery.dataTables.min.js') }}
    {{ Html::script('lib/datatables/dataTables.bootstrap.min.js') }}

    @include( 'basicmanage.proveedor.js.proveedor_ajax' )
    @include( 'basicmanage.proveedor.js.proveedor' )
    @include( 'basicmanage.empleado.js.listapersona_ajax' )
    @include( 'basicmanage.empleado.js.listapersona' )
    @include( 'basicmanage.empleado.js.listaempresa_ajax' )
    @include( 'basicmanage.empleado.js.listaempresa' )
@stop

@section('content')
<section class="content-header">
    <h1>Proveedores
        <small>Mantenimiento</small>
    </h1>
    <ol class="breadcrumb">
        <li><i class="fa fa-sitemap"></i> Mantenimiento</a></li>
        <li class="active">Proveedores</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <form id="ProveedorForm">
                    <div class="box-body table-responsive no-padding">
                        <table id="TableProveedor" class="table table-bordered table-hover">
                            <thead>
                                <tr class="cabecera">
                                  <th>Persona</th>
                                  <th>Empresa</th>
                                  <th>Estado</th>
                                  <th>[-]</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr class="cabecera">
                                  <th>Persona</th>
                                  <th>Empresa</th>
                                  <th>Estado</th>
                                  <th>[-]</th>
                                </tr>
                            </tfoot>
                        </table>
                        <div class='btn btn-primary btn-sm' class="btn btn-primary" onClick="AgregarEditar(1)" >
                            <i class="fa fa-plus fa-lg"></i>&nbsp;Nuevo</a>
                        </div>
                    </div><!-- .box-body -->
                </form><!-- .form -->
            </div><!-- .box -->
        </div><!-- .col -->
    </div><!-- .row -->
</section><!-- .content -->
@stop

@section('form')
     @include( 'basicmanage.proveedor.form.proveedor' )
     @include( 'basicmanage.empleado.form.listapersona' )
     @include( 'basicmanage.empleado.form.listaempresa' )
@stop