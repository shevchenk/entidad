<div class="modal fade" id="ModalPersona" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header btn logo">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title">Persona</h4>
        </div>
        <div class="modal-body">
          <form id="ModalPersonaForm" name="ModalPersonaForm">
          <fieldset>
          <legend>Datos personales</legend>
            <div class="row form-group">
              <div class="col-sm-12"> <!--INICIO DE COL SM 12-->
                <div class="col-sm-4">
                  <label>Nombre</label>
                  <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="Nombre">
                </div>
                <div class="col-sm-4">
                  <label>Apellido Paterno</label>
                  <input type="text" class="form-control" id="txt_paterno" name="txt_paterno" placeholder="Apellido Paterno">
                </div>
                <div class="col-sm-4">
                  <label>Apellido Materno</label>
                  <input type="text" class="form-control" id="txt_materno" name="txt_materno" placeholder="Apellido Materno">
                </div>           
              </div> <!--FIN DE COL SM 12-->


              <div class="col-sm-12"><!--INICIO DE COL SM 12-->
                <div class="col-sm-4">
                    <label>Fecha Nacimiento</label>
                    <input type="text" class="form-control" id="txt_fecha_nacimiento" name="txt_fecha_nacimiento" placeholder="AAAA-MM-DD" onfocus="blur()"/>
                </div>
                <div class="col-sm-4">
                  <label>DNI</label>
                  <input type="text" class="form-control" id="txt_dni" name="txt_dni" placeholder="DNI">
                </div>
                <div class="col-sm-4">
                  <label>Password</label>
                  <input type="password" class="form-control" id="txt_password" name="txt_password" placeholder="Password">
                </div>
              </div><!--FIN DE COL SM 12-->

              <div class="col-sm-12"><!--INICIO DE COL SM 12-->
                <div class="col-sm-4">
                  <label>Email</label>
                  <input type="text" class="form-control" id="txt_email" name="txt_email" placeholder="Email">
                </div>            
                <div class="col-sm-4">
                  <label>Sexo</label>
                  <select class="form-control" id="slct_sexo" name="slct_sexo" placeholder="Sexo">
                       <option value='' style="display:none">.:Seleccione:.</option>
                      <option value='F'>Femenino</option>
                      <option value='M' selected>Masculino</option>
                  </select>
                </div>
                <div class="col-sm-4">
                  <label>Telefono</label>
                  <input type="text" class="form-control" id="txt_telefono" name="txt_telefono" placeholder="Telefono">
                </div>
              </div><!--FIN DE COL SM 12-->

              <div class="col-sm-12"><!--INICIO DE COL SM 12-->
                <div class="col-sm-4">
                  <label>Celular</label>
                  <input type="text" class="form-control" id="txt_celular" name="txt_celular" placeholder="Celular">
                </div>            
                <div class="col-sm-4">
                  <label>Estado</label>
                    <select class="form-control" name="slct_estado" id="slct_estado">
                      <option value='0'>Inactivo</option>
                      <option value='1' selected>Activo</option>
                    </select>
                </div>
              </div><!--FIN DE COL SM 12-->
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
