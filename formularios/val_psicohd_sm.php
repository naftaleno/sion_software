<form action="<?php echo PROGRAMA.'?&opcion=108';?>" method="POST" enctype="multipart/form-data" onsubmit="return validar()" role="form" class="form-horizontal">
<section class="panel-body">
  <?php
    include("consulta_paciente.php");
  ?>
</section>
<section class="panel-body"> <!--Anamnesis-->
  <section class="panel-body">
    <article class="col-xs-3">
      <label for="">Fecha de registro:</label>
      <input type="text" name="freg" value="<?php echo $date ;?>" class="form-control" <?php echo $atributo1;?> >
      <input type="hidden" name="idadmhosp" value="<?php echo $_GET["idadmhosp"] ;?>" class="form-control" <?php echo $atributo1;?> >
    </article>
    <article class="col-xs-3">
      <label for="">Hora de registro</label>
      <input type="time" name="hreg" value="<?php echo $date1 ;?>" class="form-control" <?php echo $atributo1;?>>
    </article>
    <article class="col-xs-12">
      <label for="">Motivo de consulta: <span class="fa fa-info-circle" data-toggle="popover" title="" data-content=""></span></label>
      <textarea class="form-control" name="motivo_consulta" rows="5" id="comment" ></textarea>
    </article>
    <article class="col-xs-12">
      <label for="" >Historia Familiar y Personal: <span class="fa fa-info-circle" data-toggle="popover" title="" data-content=""></span></label>
      <textarea class="form-control" name="hfamiliar_personal" rows="5" id="comment" ></textarea>
    </article>

    <article class="col-xs-12">
      <label for="">Evaluación psicologica: <span class="fa fa-info-circle" data-toggle="popover" title="" data-content=""></span></label>
      <textarea class="form-control" name="evaluacion_psico" rows="6" id="comment" ></textarea>
    </article>
    <article class="col-xs-12">
      <label for="">Analisis del caso: <span class="fa fa-info-circle" data-toggle="popover" title="" data-content=""></span></label>
      <textarea class="form-control" name="analisis_caso" rows="6" id="comment" ></textarea>
    </article>
    <article class="col-xs-12">
      <label for="">Recomendaciones: <span class="fa fa-info-circle" data-toggle="popover" title="" data-content=""></span></label>
      <textarea class="form-control" name="recomendaciones" rows="6" id="comment" ></textarea>
    </article>
    <article class="col-xs-12">
      <label for="">Plan de tratamiento: <span class="fa fa-info-circle" data-toggle="popover" title="" data-content=""></span></label>
      <textarea class="form-control" name="plan_tratamiento" rows="6" id="comment" ></textarea>
    </article>
  </section>
  <div class="row text-center">
	  <input type="submit" class="btn btn-primary" name="aceptar" Value="<?php echo $boton; ?>" />
		<input type="hidden" class="btn btn-primary" name="opcion" Value="<?php echo $_GET["opcion"];?>"/>
		<input type="hidden" class="btn btn-primary" name="operacion" Value="<?php echo $_GET["mante"];?>"/>
	</div>
</section>
</form>
