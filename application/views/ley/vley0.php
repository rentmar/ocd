<html>
    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 color-contenedores">
        <p>
            <br>
        	<table>
            <tr id="datos">
                <th>Ley</th>
                <th>En Tratamiento</th>
                <th>Sancionada</th>
                <th>Aprobada</th>
                <th>Con Modificacion</th>
                <th>Promulgada</th>
<!--                <th>Accion</th>-->
            </tr>
            <?php foreach ($Leyes1 as $u) {?>
            <tr>
                <td><?php echo $u->nombre;?></td>
                <td><?php echo $u->{'Ley en Tratamiento'};?></td>
                <td><?php echo $u->{'Ley Sancionada'};?></td>
                <td><?php echo $u->{'Ley Aprobada'};?></td>
                <td><?php echo $u->{'Ley con Modificacion'};?></td>
                <?php if($u->{'Ley Promulgada'} != '0'):?>
                <td><a data-toggle="modal" data-target="ModalWill"><?php echo $u->{'Ley Promulgada'};?></a></td>
                <?php else: ?>
                <td><?php echo $u->{'Ley Promulgada'};?></td>
                <?php endif; ?>
<!--                <td><a href="<?php //echo site_url('Usuarios/editarUsuario/'.$u->idusuario);?>">editar</a></td>-->
            </tr>
            <?php } ?>
	</table>
    </div>
</html>