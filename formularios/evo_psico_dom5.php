<form action="<?php echo PROGRAMA.'?&opcion=65';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
	<section class="panel-body">
	  <?php
	    include("consulta_paciente.php");
	  ?>
	</section>
	<article>
		<h4 id="th-estilot">Evoluciones Psicologia Domiciliarios</h4>
<?php include("consulta_rapidaDOM.php");?>

	<section class="panel-body"> <!--evolucion to-->
			<article class="col-xs-3">
				<label for="">Fecha de registro:</label>
				<input type="date" name="freg" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo2;?>>
				<input type="hidden" name="fecha" value="<?php echo $date1;?>">
				<input type="hidden" name="fregreg" value="<?php echo date('Y-m-d H:m:s') ;?>" class="form-control" <?php echo $atributo2;?>>
				<input type="hidden" name="idadmhosp" value="<?php echo $fila['id_adm_hosp'];?>">
			</article>
			<article class="col-xs-3">
				<label for="">Hora de Evolucion</label>
				<input type="time" name="hregevo" value="<?php echo $date1 ;?>" class="form-control">
				<input type="hidden" name="hreg" value="<?php echo $date1 ;?>" class="form-control">
			</article>
			<article class="col-xs-10">
				<label for="">Evolucion Psicologia:</label>
				<button type="button" class="fa fa-plus btn-danger"  onclick="verTexto18()" ></button>
				<textarea class="form-control" name="evoto" rows="15" id="respuesta18" required ></textarea>
			</article>
		</section>
	<div class="row text-center">
	  <input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
  </section>
</form>
