<!-- /.modal -->
<div class="modal fade" id="ModalListaempresa" tabindex="-1" role="dialog" aria-hidden="true">
<!-- <div class="modal fade" id="areaModal" tabindex="-1" role="dialog" aria-hidden="true"> -->
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header btn-info">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Lista Empresa</h4>
        </div>
      <div class="modal-body">
                            <form id="ListaempresaForm">
                    <div class="box-body table-responsive no-padding">
                        <table id="TableListaempresa" class="table table-bordered table-hover">
                            <thead>
                                <tr class="cabecera">
                                    <th class="col-xs-3">
                                        <div class="form-group">
                                            <label><h4>Persona:</h4></label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                <input type="text" class="form-control" name="txt_paterno" id="txt_paterno" placeholder="Buscar Apellido Paterno" onkeypress="return masterG.enterGlobal(event,'.input-group',1);">
                                            </div>
                                        </div>
                                    </th>
                                    <th class="col-xs-2">
                                        <div class="form-group">
                                            <label><h4>Razón Social:</h4></label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                <input type="text" class="form-control" name="txt_materno" id="txt_materno" placeholder="Buscar Apellido Materno" onkeypress="return masterG.enterGlobal(event,'.input-group',1);">
                                            </div>
                                        </div>
                                    </th>
                                    <th class="col-xs-2">
                                        <div class="form-group">
                                            <label><h4>RUC:</h4></label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                <input type="text" class="form-control" name="txt_nombre" id="txt_nombre" placeholder="Buscar Nombre" onkeypress="return masterG.enterGlobal(event,'.input-group',1);">
                                            </div>
                                        </div>
                                    </th>
                                     <th class="col-xs-2">
                                        <div class="form-group">
                                            <label><h4>Nombre Comercial:</h4></label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><i class="fa fa-search"></i></div>
                                                <input type="text" class="form-control" name="txt_dni" id="txt_dni" placeholder="Buscar DNI" onkeypress="return masterG.enterGlobal(event,'.input-group',1);">
                                            </div>
                                        </div>
                                    </th>                                    
                                    <th class="col-xs-1">[-]</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                            <tfoot>
                                <tr class="cabecera">
                                  <th>Persona</th>
                                  <th>Razón Social</th>
                                  <th>RUC</th>
                                  <th>Nombre Comercial</th>
                                  <th>[-]</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div><!-- .box-body -->
                </form><!-- .form -->
      </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default active pull-left" data-dismiss="modal">Close</button>
<!--          <button type="button" class="btn btn-primary">Save</button>-->
        </div>
    </div>
  </div>
</div>
<!-- /.modal -->
