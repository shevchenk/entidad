<div class="modal" id="ModalProducto" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header btn-info">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Producto</h4>
        </div>
        <div class="modal-body">
          <form id="ModalProductoForm">
            <div class="form-group">
              <label>Producto</label>
              <input type="text" class="form-control" id="txt_producto" name="txt_producto" placeholder="Producto">
            </div>
            <div class="form-group">
              <label>Sucursal</label>
              <select  class="form-control selectpicker show-menu-arrow" data-live-search="true" id="slct_sucursal" name="slct_sucursal">
                  <option value="0">.::Seleccione::.</option>
              </select>
            </div>
            <div class="form-group">
              <label>Artículo</label>
              <select  class="form-control" id="slct_articulo" name="slct_articulo">
                  <option value="0">.::Seleccione::.</option>
              </select>
            </div>
            <div class="form-group">
              <label>Precio Venta</label>
              <input type="text" onkeyup="masterG.DecimalMax(this,2);" onkeypress="return masterG.validaDecimal(event,this);" class="form-control" id="txt_precio_venta" name="txt_precio_venta">
            </div>
            <div class="form-group">
              <label>Precio Compra</label>
              <input type="text" onkeyup="masterG.DecimalMax(this,2);" onkeypress="return masterG.validaDecimal(event,this);" class="form-control" id="txt_precio_compra" name="txt_precio_compra">
            </div>
            <div class="form-group">
              <label>Moneda</label>
              <select  class="form-control selectpicker show-menu-arrow" id="slct_moneda" name="slct_moneda">
                  <option value="0">.::Seleccione::.</option>
                  <option data-icon="fa fa-strikethrough" 
                          value="1">Soles</option>
                  <option data-icon="fa fa-dollar" 
                          value="2">Dolares</option>
              </select>
            </div>
            <div class="form-group">
              <label>Stock</label>
              <input type="number" onkeypress="return masterG.validaNumeros(event);" class="form-control" id="txt_stock" name="txt_stock" placeholder="Stock">
            </div>
            <div class="form-group">
              <label>Stock Minimo</label>
              <input type="number" onkeypress="return masterG.validaNumeros(event);" class="form-control" id="txt_stock_minimo" name="txt_stock_minimo" placeholder="Stock Minimo">
            </div>
            <div class="form-group">
              <label>Días Alerta</label>
              <input type="number" onkeypress="return masterG.validaNumeros(event);" class="form-control" id="txt_dias_alerta" name="txt_dias_alerta" placeholder="Días Alerta">
            </div>
            <div class="form-group">
              <label>Fecha Vencimiento</label>
              <input type="text" class="form-control fechas" id="txt_fecha_vencimiento" name="txt_fecha_vencimiento" placeholder="0000-00-00" >
            </div>
            <div class="form-group">
              <label>Días Vencimiento</label>
              <input type="number" onkeypress="return masterG.validaNumeros(event);" class="form-control" id="txt_dias_vencimiento" name="txt_dias_vencimiento" placeholder="Dias Vencimiento">
            </div>
            <div class="form-group">
              <label>Estado</label>
              <select class="form-control selectpicker show-menu-arrow" name="slct_estado" id="slct_estado">
                <option data-content="<span class='label label-danger'>Inactivo</span>" 
                        value='0'>Inactivo</option>
                <option data-content="<span class='label label-success'>Activo</span>" 
                        value='1'
                        selected>Activo</option>
              </select>
            </div>
            <div class="form-group">
              <label>Imagen</label>
                <input type="text"  readOnly class="form-control input-sm" id="pago_nombre"  name="pago_nombre" value="">
                <input type="text" style="display: none;" id="pago_archivo" name="pago_archivo">
                <label class="btn btn-default btn-flat margin btn-xs">
                <i class="fa fa-file-image-o fa-lg"></i>
                <input type="file" style="display: none;" onchange="onPagos(event);" >
                </label>
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
