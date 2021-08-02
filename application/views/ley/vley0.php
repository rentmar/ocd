<!doctype html>
<html lang="es">
  <head>
      <meta charset="utf-8">
      <link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css">
      <title>Ley</title>  
  </head>
  <body>
      <br>
      <div class="container">
          <div class="row">
              
              <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
                  <div id="caja_boton">
                      <div id="contenedor-submit">
                  <a href="<?php echo site_url('Formulario/crearFormulario');?>">
                      <input type="submit" class="BOTON" value="CREAR">
                  </a>
                  <a href="<?php echo site_url('/'); ?>">
                      <input type="button" class="BOTONROJO" value="CANCELAR">
                  </a>
              </div>
          </div>
      </div>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
        <p>
        	<table>
            <tr id="datos">
                <th>Ley</th>
                <th>En Tratamiento</th>
                <th>Sancionada</th>
                <th>Aprobada</th>
                <th>Con Modificacion</th>
                <th>Promulgada</th>
                <th>Accion</th>
            </tr>
            					<tbody>
					<?php if(isset($Leyes1)): ?>
            <?php foreach ($Leyes1 as $u) {?>
            <tr>
                <td><?php echo $u->nombre;?></td>
                <td><?php echo $u->{'Leyes en tratamiento'};?></td>
                <td><?php echo $u->{'Leyes sancionadas'};?></td>
                <td><?php echo $u->{'Leyes aprobadas'};?></td>
                <td><?php echo $u->{'Leyes con modificacion'};?></td>
                <td><?php echo $u->{'Leyes promulgadas'};?></td>
                <td><a href="#" data-toggle="modal" data-target="#miModal"><?php echo 'Actualizar';?></a></td>
                
<!--                <?php// if($u->{'Ley Promulgada'} != '0'):?>
                <td><a href="#" data-toggle="modal" data-target="#miModal"><?php //echo $u->{'Ley Promulgada'};?></a></td>
                <?php //else: ?>
                <td><?php //echo $u->{'Ley Promulgada'};?></td>
                <?php //endif; ?>-->
            </tr>
            <?php } ?>
            					<?php endif; ?>
					</tbody>
            
	</table>
    </div>
                    		</div>
	</div>
      <br>
      
    <div id="miModal" class="modal" tabindex="-1" role="dialog">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title" id="exampleModalLabel"></h1>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <?php echo form_open('Ley/ActualizarLey/');?>
<!--              <form id="formPersonas">-->
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="titulo" class="col-form-label">Titulo:</label>
                          <input type="text" class="form-control" id="titulo" name="titulo" required >
                      </div>
                      <div class="form-group">
                          <label for="url" class="col-form-label">Url:</label>
                          <input type="text" class="form-control" id="url" name="url" required>
                      </div>
                      <div class="form-group">
                          <input type="hidden" id="idestadoL" name="idestadoL" value="<?php //echo $EsDeLe->idestadoley; ?>">
                      </div>
                      <div class="form-group">
                          <label for="rel_idestadoley" >Seleccionar Estado de Ley</label>
                          <select class="combo" id='cuadro' name='rel_idestadoley' required>
                              <option value="0"></option>
                              <option value="1">Leyes en Tratamiento</option>
                              <option value="2">Leyes Sancionadas</option>
                              <option value="3">Leyes Aprobadas</option>
                              <option value="4">Leyes con Modificacion</option>
                              <option value="5">Leyes Promulgadas</option>
                          </select>
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                      <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                  </div>
              <?php echo form_close();?>
<!--              </form>-->
          </div>
      </div>
    </div>
    
<div class="modal" id="mediomodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Editar Medio de Comunicacion</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('Instdemocratica/editarMedio');?>
			<div class="modal-body">
				<div class="form-group">
					<input type="hidden" id="idnoticia" name="idnoticia"
						value="<?php echo $noticia->idnoticia; ?>">
				</div>
				<div class="form-group">
					<label for="rel_idtipomedio" >
						Seleccionar Tipo Medio
					</label>
					<select class="combo" id='cuadro' name='rel_idtipomedio' required>
						<option value="0"></option>
						<?php foreach ($tipos as $tm) {?>
						<option value='<?php echo $tm->idtipomedio;?>'><?php echo $tm->nombre_tipo;?></option>
						<?php } ?>
					</select>
				</div>
			</div>
			<div class="modal-footer">
				<button type="submit" name="accion" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
					Continuar
				</button>
			<?php echo form_close();?>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>      
      
      
      
      
      
      
      
      
      
      
      
      
      
    <script src="jquery/jquery-3.3.1.min.js"></script>
    <script src="popper/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
  </body>
</html>