<div class="modal" id="ModalEmpresa" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn-info">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Empresa</h4>
        </div>
        <div class="modal-body">
          <form id="ModalEmpresaForm">

            <div class="form-group">
              <label>Persona</label>
              <input type="text" class="form-control" id="txt_persona_id" name="txt_persona_id" placeholder="Entidad">
              <input type="button" name="Buscar">
            </div>

            <div class="form-group">
              <label>Razon Social</label>
              <input type="text" class="form-control" id="razon_social" name="razon_social" placeholder="Razon Social">
            </div>

            <div class="form-group">
              <label>Ruc</label>
              <input type="text" class="form-control" id="txt_ruc" name="txt_ruc" placeholder="Ruc">
            </div>

            <div class="form-group">
              <label>Nombre_Comercial</label>
              <input type="text" class="form-control" id="txt_nombre_comercial" name="txt_nombre_comercial" placeholder="Nombre_Comercial">
            </div>

            <div class="form-group">
              <label>Direccion Fiscal</label>
              <input type="text" class="form-control" id="txt_direccion_fiscal" name="txt_direccion_fiscal" placeholder="Direccion Fiscal">
            </div>

            <div class="form-group">
              <label>Telefono</label>
              <input type="text" class="form-control" id="txt_telefono" name="txt_telefono" placeholder="Telefono">
            </div>

            <div class="form-group">
              <label>Celular</label>
              <input type="text" class="form-control" id="txt_celular" name="txt_celular" placeholder="Celular">
            </div>

            <div class="form-group">
              <label>Email</label>
              <input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="Email">
            </div>

            <!--<div class="form-group">
              <label>Logo</label>
              <input type="text" class="form-control" id="txt_Logo" name="txt_Logo" placeholder="Logo">
            </div>-->

            <div class="form-group">
              <label>Estado</label>
              <select class="form-control" name="slct_estado" id="slct_estado">
                <option value='0'>Inactivo</option>
                <option value='1' selected>Activo</option>
              </select>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default active pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
