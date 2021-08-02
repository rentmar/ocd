<!doctype html>
<html lang="en">
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
                  <a href="<?php echo site_url('ley/crearley');?>">
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
                <th style="width:300px">Avance</th>
                <th>Accion</th>
            </tr>
            <?php foreach ($Leyes as $u) {?>
            <tr>
                <td><?php echo $u->resumen;?></td>
                <td>
					<div class="progress" style="height:50px">
						<div class="progress-bar progress-bar-striped " style="width:<?php echo $u->porcentaje_estadoley;?>%;height:20px">
							<div class="">
								<?php echo $u->porcentaje_estadoley."%";?>
							</div>

						</div>
					</div>
				</td>

                <td><a href="#" data-toggle="modal" data-target="#miModal"><?php echo 'Modificar';?></a></td>
                
<!--                <?php// if($u->{'Ley Promulgada'} != '0'):?>
                <td><a href="#" data-toggle="modal" data-target="#miModal"><?php //echo $u->{'Ley Promulgada'};?></a></td>
                <?php //else: ?>
                <td><?php //echo $u->{'Ley Promulgada'};?></td>
                <?php //endif; ?>-->
            </tr>
            <?php } ?>
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
              <form id="formPersonas">
                  <div class="modal-body">
                      <div class="form-group">
                          <label for="ley" class="col-form-label">Ley:</label>
                          <input type="text" class="form-control" id="ley">
                      </div>
                      <div class="form-group">
                          <label for="tratamiento" class="col-form-label">Tratamiento:</label>
                          <input type="text" class="form-control" id="tratamiento">
                      </div>
                      <div class="form-group">
                          <label for="sancionada" class="col-form-label">Sancionada:</label>
                          <input type="text" class="form-control" id="sancionada">
                      </div>
                      <div class="form-group">
                          <label for="aprobada" class="col-form-label">Aprobada:</label>
                          <input type="text" class="form-control" id="aprobada">
                      </div>
                      <div class="form-group">
                          <label for="modificada" class="col-form-label">Modificada:</label>
                          <input type="text" class="form-control" id="modificada">
                      </div>
                      <div class="form-group">
                          <label for="promulgada" class="col-form-label">Promulgada:</label>
                          <input type="text" class="form-control" id="promulgada">
                      </div>
                  </div>
                  <div class="modal-footer">
                      <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                      <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
                  </div>
              </form>
          </div>
      </div>
    </div>
    
    <script src="bootstrap4/js/bootstrap.min.js"></script>
  </body>
</html>
