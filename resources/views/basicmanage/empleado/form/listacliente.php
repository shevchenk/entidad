<!-- /.modal -->
<div class="modal fade" id="ModalListacliente" tabindex="-1" role="dialog" aria-hidden="true">
    <!-- <div class="modal fade" id="areaModal" tabindex="-1" role="dialog" aria-hidden="true"> -->
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header btn-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Lista Cliente</h4>
            </div>
            
            <div class="modal-body">
                <section class="content">
                    <div class="box">
                        <form id="ListaclienteForm">
                            <div class="box-body table-responsive no-padding">
                                <table id="TableListacliente" class="table table-bordered table-hover">
                                    <thead>
                                        <tr class="cabecera">
                                            <th>Paterno</th>
                                            <th>Materno</th>
                                            <th>Nombre</th>
                                            <th>DNI</th>
                                            <th>[-]</th>
                                       <!-- ESTE BOTON ES PARA EL EDITAR   
                                            <th>[-]</th> -->
                                        </tr>
                                    </thead>
                                    <tbody>s
                                    </tbody>
                                    <tfoot>
                                        <tr class="cabecera">
                                            <th>Paterno</th>
                                            <th>Materno</th>
                                            <th>Nombre</th>
                                            <th>DNI</th>
                                            <th>[-]</th>
                                    <!-- ESTE BOTON ES PARA EL EDITAR   
                                            <th>[-]</th> -->
                                        </tr>
                                    </tfoot>
                                </table>
                            </div><!-- .box-body -->
                        </form><!-- .form -->
                    </div>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default active pull-left" data-dismiss="modal">Close</button>
                <!--AGREGAR EDITAR DEL BOTON NUEVO EN LISTA CLIENTE-->
                <button type="button" class="btn btn-primary active pull-right" onclick="AgregarEditarNuevoListaCliente(1)">Nuevo</button>
                <!--***********************************************-->
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
