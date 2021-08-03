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
                  <a href="<?php echo site_url('Ley/crearLey');?>">
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
            <?php foreach ($leyes as $u) {?>
            <tr>
                <td><?php echo $u->resumen;?></td>
                <td><?php echo "Ley en Tratamiento"; ?></td>
                <td><?php echo "";?></td>
                <td><?php echo "";?></td>
                <td><?php echo "";?></td>
                <td><?php echo "";?></td>
                <td><a href="#" data-toggle="modal" data-target="#datosmodal">Actualizar</a></td>
            </tr>
            <?php } ?>
	</table>
    </div>
</div>
	</div>
      <br>	  
	  
	  
<div class="modal" id="datosmodal">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title">Estado Ley</h1>
				<button type="button" class="close" data-dismiss="modal">×</button>
			</div>
			<?php echo form_open('Ley/mostrarLey');?>
			<div class="modal-body">
				<div class="form-group">
					<label>Titulo de la Ley:</label><br>
					<input type="text" id="titulo" name="titulo" class="form-control">
				</div>
				<div class="form-group">
					<label>Codigo de la Ley:</label><br>
					<input type="text" id="titulo" name="titulo" class="form-control">
				</div>
				<div class="form-group">
					<label>URL de la Ley:</label><br>
					<input type="text" id="titulo" name="titulo" class="form-control">
				</div>
				<select class="combo" id='cuadro' name='rel_idfuente' required>
					<option value="0">Elegir Estado</option>
					<option value="1">En Tratamiento</option>	
					<option selected="true" value="2">Sancionada</option>
					<option value="3">Aprobada</option>
					<option value="4">Con Modificacion</option>
					<option value="5">Promulgada</option>
				</select>
			</div>
			<div class="modal-footer">
				<button type="submit" name="accion" class="btn btn-primary" style="background-color:#474142; color:#ffffff">
					Actualizar
				</button>
			<?php echo form_close();?>
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
			</div>
		</div>
	</div>
</div>

</html>
