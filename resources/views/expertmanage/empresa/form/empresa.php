<div class="modal" id="ModalEmpresa" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header btn-info">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Empresa</h4>
        </div>
        <div class="modal-body">
          <form id="ModalEmpresaForm" name="ModalEntidadForm">
          <fieldset>

            <div class="form-group">
            <div class="col-sm-12"> <!--INICIO DE COL SM 12-->
              <label>Persona</label>
              <input type="text" class="form-control" id="txt_persona" name="txt_persona" readonly="">
              <input type="hidden" class="form-control mant" id="txt_persona_id" name="txt_persona_id" readonly="">
              
              <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ModalListapersona" data-empresaid="ModalEmpresa #txt_empresa_id" data-empresa="ModalEmpresa #txt_empresa" data-personaid="ModalEmpresa #txt_persona_id" data-persona="ModalEmpresa #txt_persona">Persona</a>
            </div> <!--FIN DE COL SM 12-->
          

              <div class="col-sm-12"> <!--INICIO DE COL SM 12-->
              <div class="col-sm-4">
              <label>Razon Social</label>
              <input type="text" class="form-control" id="txt_razon_social" name="txt_razon_social" placeholder="Razon Social">
              </div>
           
              <div class="col-sm-4">
              <label>Nombre_Comercial</label>
              <input type="text" class="form-control" id="txt_nombre_comercial" name="txt_nombre_comercial" placeholder="Nombre_Comercial">
              </div>
         
              <div class="col-sm-4">
              <label>Ruc</label>
              <input type="text" class="form-control" id="txt_ruc" name="txt_ruc" placeholder="Ruc">
              </div>
              </div>

              <div class="col-sm-12"> <!--INICIO DE COL SM 12-->
              <div class="col-sm-4">
              <label>Direccion Fiscal</label>
              <input type="text" class="form-control" id="txt_direccion_fiscal" name="txt_direccion_fiscal" placeholder="Direccion Fiscal">
              </div>

              <div class="col-sm-4">
              <label>Telefono</label>
              <input type="text" class="form-control" id="txt_telefono" name="txt_telefono" placeholder="Telefono">
              </div>

              <div class="col-sm-4">
              <label>Celular</label>
              <input type="text" class="form-control" id="txt_celular" name="txt_celular" placeholder="Celular">
              </div>
            </div>

              <div class="col-sm-12"> <!--INICIO DE COL SM 12-->
              <div class="col-sm-4">
              <label>Email</label>
              <input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="Email">
              </div>
            

            <!--<div class="form-group">
              <label>Logo</label>
              <input type="text" class="form-control" id="txt_Logo" name="txt_Logo" placeholder="Logo">
            </div>-->

              <div class="col-sm-4">
              <label>Estado</label>
              <select class="form-control" name="slct_estado" id="slct_estado">
                <option value='0'>Inactivo</option>
                <option value='1' selected>Activo</option>
              </select>
              </div>
              </div>
            </div>
            </fieldset>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default active pull-left" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save</button>
        </div>
      </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
