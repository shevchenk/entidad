<div class="modal" id="ModalProveedorDetalle" tabindex="-1" role="dialog">
    <div class="modal-dialog">
      <div class="modal-content">
          
        <div class="modal-header btn-info">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Proveedor Detalle</h4>
        </div>
          
        <div class="modal-body">
          <form id="ModalProveedorDetalleForm" name="ModalProveedorDetalleForm">
              <input type='hidden' class='id' value='r.id'>
            <div class="form-group">

              <div class="col-md-12"> <!--INICIO DE COL SM 12-->
                <label>Proveedor</label>
              </div>
              <div class="input-group margin">              
                <input type="hidden" class="form-control mant" id="txt_proveedor_id" name="txt_proveedor_id" readonly="">
                <input type="text" class="form-control" id="txt_proveedor" name="txt_proveedor" readonly="">                  
                  <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#ModalListaproveedor" data-filtros="estado:1" data-proveedordetalleid="ModalProveedorDetalle #txt_proveedordetalle_id" data-proveedordetalle="ModalProveedorDetalle #txt_proveedordetalle" data-proveedorid="ModalProveedorDetalle #txt_proveedor_id" data-proveedor="ModalProveedorDetalle #txt_proveedor">Proveedor</button>
                  </span>                         
              </div>

              <div class="col-md-12"> <!--INICIO DE COL SM 12-->
                <label>Categoria</label>
              </div>
              <div class="input-group margin">              
                <input type="hidden" class="form-control mant" id="txt_categoria_id" name="txt_categoria_id" readonly="">
                <input type="text" class="form-control" id="txt_categoria" name="txt_categoria" readonly="">                  
                  <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#ModalListacategoria" data-filtros="estado:1" data-proveedordetalleid="ModalProveedorDetalle #txt_proveedordetalle_id" data-proveedordetalle="ModalProveedorDetalle #txt_proveedordetalle" data-categoriaid="ModalProveedorDetalle #txt_categoria_id" data-categoria="ModalProveedorDetalle #txt_categoria">Categoria</button>
                  </span>                         
              </div>

              <div class="col-md-12"> <!--INICIO DE COL SM 12-->
                <label>Articulo</label>
              </div>
              <div class="input-group margin">              
                <input type="hidden" class="form-control mant" id="txt_articulo_id" name="txt_articulo_id" readonly="">
                <input type="text" class="form-control" id="txt_articulo" name="txt_articulo" readonly="">                  
                  <span class="input-group-btn">
                      <button type="button" class="btn btn-info btn-flat" data-toggle="modal" data-target="#ModalListaarticulo" data-filtros="estado:1" data-proveedordetalleid="ModalProveedorDetalle #txt_proveedordetalle_id" data-proveedordetalle="ModalProveedorDetalle #txt_proveedordetalle" data-articuloid="ModalProveedorDetalle #txt_articulo_id" data-articulo="ModalProveedorDetalle #txt_articulo">Articulo</button>
                  </span>                         
              </div>
            

              <div class="col-sm-4">
                <label>Estado</label>
                  <select class="form-control" name="slct_estado" id="slct_estado">
                    <option value='0'>Inactivo</option>
                    <option value='1' selected>Activo</option>
                  </select>
              </div>
                
            </div><!-- FIN DE FORM GROUP -->

          <!--<div class="form-group"> 
                         <label></label>
           </div>-->
           

            </form>
        </div> <!-- FIN DE MODAL BODY -->
           
        
        <div class="modal-footer">
          <button type="button" class="btn btn-default active pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
        
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
