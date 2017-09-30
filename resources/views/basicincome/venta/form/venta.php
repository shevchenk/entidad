<div class="modal" id="ModalVenta" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header btn-info">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Venta</h4>
        </div>
        <div class="modal-body">
          <form id="ModalVentaForm"><!-- INICIO DE FORM -->

            <div class="col-md-6">
                <div class="form-group">
                  <label>Sucursal</label>
                    <select  class="form-control selectpicker show-menu-arrow" data-live-search="true" id="slct_sucursal" name="slct_sucursal">
                      <option value="0">.::Seleccione::.</option>
                    </select>
                </div> 
            </div>

            <!-- INICIO DE CLIENTE -->
            <div style="text-align:right" class="col-md-6">
              <label>Cliente</label>
            </div>
                    
              <div class="input-group margin">
                <input type="hidden" class="form-control mant" id="txt_cliente_id" name="txt_cliente_id" readOnly="">
                <input type="text" class="form-control" id="txt_cliente" name="txt_cliente"  disabled="">
                <span class="input-group-btn">
                  <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#ModalListacliente" data-filtros="estado:1" data-clienteid="ModalVentaForm #txt_cliente_id" data-cliente="ModalVentaForm #txt_cliente">Buscar
                  </button>
                </span>
              </div>
            <!-- FIN DE CLIENTE-->

            
        
          </form> <!-- FIN DE FORM -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default active pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
