<form action="<?php echo PROGRAMA;?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
<section class="panel-body">
	<?php
		include("consulta_paciente.php");
	?>
</section>

	<article>
		<h4 id="th-estilot">Datos de Evolución Psicología</h4>
		<?php include("consulta_rapida.php");?>
	<section class="panel-body"> <!--Anamnesis-->

		<section >
			<article class="col-xs-3">
				<label for="">Fecha de registro:</label>
				<input type="text" name="freg" value="<?php echo $_REQUEST['fecha'];?>" class="form-control" <?php echo $atributo1?> >
				<input type="hidden" name="idadmhosp" value="<?php echo $fila['id_adm_hosp'] ;?>" class="form-control" <?php echo $atributo2;?> >
			</article>
			<article class="col-xs-3">
				<label for="">Hora de registro</label>
				<input type="text" name="hreg" value="<?php echo $date1 ;?>" class="form-control" <?php echo $atributo1?>>
			</article>
			<br>
			<article class="col-xs-10">
				<label for="">Tipo de sesión: <span class="fa fa-info-circle" data-toggle="popover" title="" data-content=""></span></label>
				<select class="form-control" name="tsesion">
					<option value="Valoracion">Valoración</option>
					<option value="psicoterapia">Psicoterapia</option>
				</select>
			</article>
			<article class="col-xs-10">
				<label >Objetivo de la sesión: <span class="fa fa-info-circle" data-toggle="popover" title="" data-content=""></span></label>
				<textarea class="form-control" name="objsesion" rows="6" id="comment" required=""></textarea>
			</article>
			<article class="col-xs-10">
				<label for="">Actividades: <span class="fa fa-info-circle" data-toggle="popover" title="" data-content=""></span></label>
				<textarea class="form-control" name="actividades" rows="6" id="comment" required=""></textarea>
			</article>
			<article class="col-xs-10">
				<label for="">Resultado de la sesión: <span class="fa fa-info-circle" data-toggle="popover" title="" data-content=""></span></label>
				<textarea class="form-control" name="resultado" rows="6" id="comment" required=""></textarea>
			</article>
			<article class="col-xs-10">
				<label for="">Observaciones: <span class="fa fa-info-circle" data-toggle="popover" title="" data-content=""></span></label>
				<textarea class="form-control" name="obsevopsico" rows="6" id="comment" required=""></textarea>
			</article>
		</section>
</section>

	<div class="row text-center">
	  	<input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
  </section>
</form>
