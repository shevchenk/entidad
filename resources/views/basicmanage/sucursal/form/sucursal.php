<div class="modal" id="ModalSucursal" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content"> 
        <div class="modal-header btn-info">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Sucursal</h4>
        </div>
        <div class="modal-body">
          <form id="ModalSucursalForm">
            <div class="form-group">
              <label>Sucursal</label>
              <input type="text" class="form-control" id="txt_sucursal" name="txt_sucursal" placeholder="Sucursal">
            </div>
            <div class="form-group">
              <label>Direccion</label>
              <input type="text" class="form-control" id="txt_direccion" name="txt_direccion" placeholder="Direccion">
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
