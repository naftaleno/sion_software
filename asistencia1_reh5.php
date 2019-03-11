<?php
require_once('calendar1/bdd.php');


$sql = "SELECT id, title, start, end, color FROM events ";

$req = $bdd->prepare($sql);
$req->execute();

$events = $req->fetchAll();

?>
<script src="js_p/bootstrap.js"></script>

    <div class="row">
      <div id="calendar" class="col-centered"></div>
    </div>
    <!-- /.row -->

<!-- Modal -->
<div class="modal fade" id="ModalAdd" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog ui-front" role="document">
  <div class="modal-content">
  <form class="form-horizontal" method="POST" action="calendar1/addEvent.php">

    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Registrar asistencia</h4>
    </div>
    <div class="modal-body">

      <div class="form-group">
      <label for="title" class="col-sm-2 control-label">Paciente: </label>
      <div class="col-sm-10">
        <input type="text" name="title" class="form-control" id="title" placeholder="Digite nombre o documento" >
      </div>
      </div>
      <div class="form-group">
      <label for="color" class="col-sm-2 control-label">Jornada</label>
      <div class="col-sm-10">
        <select name="color" class="form-control" id="color">
          <option value="">Seleccione Jornada:</option>
          <option style="color:#0071c5;" value="Mañana">&#9724; Mañana</option>
          <option style="color:#40E0D0;" value="Tarde">&#9724; Tarde</option>
        </select>
      </div>
      </div>
      <div class="form-group">
      <label for="start" class="col-sm-2 control-label">Fecha Inicial</label>
      <div class="col-sm-10">
        <input type="text" name="start" class="form-control" id="start" readonly>
      </div>
      </div>
      <div class="form-group">
      <label for="end" class="col-sm-2 control-label">Fecha Final:</label>
      <div class="col-sm-10">
        <input type="text" name="end" class="form-control" id="end" readonly>
      </div>
      </div>

    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form>
  </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
  <div class="modal-content">
  <form class="form-horizontal" method="POST" action="calendar1/editEventTitle.php">
    <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
    <h4 class="modal-title" id="myModalLabel">Editar registro</h4>
    </div>
    <div class="modal-body">

      <div class="form-group">
      <label for="title" class="col-sm-2 control-label">Paciente</label>
      <div class="col-sm-10">
        <input type="text" name="title" class="form-control" id="title" placeholder="Title">
      </div>
      </div>
      <div class="form-group">
      <label for="color" class="col-sm-2 control-label">Jornada</label>
      <div class="col-sm-10">
        <select name="color" class="form-control" id="color">
          <option value="">Choose</option>
          <option style="color:#0071c5;" value="Mañana">&#9724; Mañana</option>
          <option style="color:#40E0D0;" value="Tarde">&#9724; Tarde</option>

        </select>
      </div>
      </div>
        <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <div class="checkbox">
          <label class="text-danger"><input type="checkbox"  name="delete"> Eliminar registro</label>
          </div>
        </div>
      </div>

      <input type="hidden" name="id" class="form-control" id="id">


    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
    <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
  </form>
  </div>
  </div>
</div>


<script>
$(document).ready(function() {

  $('#calendar').fullCalendar({
    locale: "es",
    sunday: false,
    header: {
      left: 'prev,next today',
      center: 'title',
      right: 'month'
    },
    editable: true,
    eventLimit: true, // allow "more" link when too many events
    selectable: true,
    selectHelper: true,
    select: function(start, end) {

      $('#ModalAdd #start').val(moment(start).format('YYYY-MM-DD HH:mm:ss'));
      $('#ModalAdd #end').val(moment(end).format('YYYY-MM-DD HH:mm:ss'));
      $('#ModalAdd').modal('show');
    },
    eventRender: function(event, element) {
      element.bind('dblclick', function() {
        $('#ModalEdit #id').val(event.id);
        $('#ModalEdit #title').val(event.title);
        $('#ModalEdit #color').val(event.color);
        $('#ModalEdit').modal('show');
      });
    },
    eventDrop: function(event, delta, revertFunc) { // si changement de position

      edit(event);

    },
    eventResize: function(event,dayDelta,minuteDelta,revertFunc) { // si changement de longueur

      edit(event);

    },
    events: [
    <?php foreach($events as $event):

      $start = explode(" ", $event['start']);
      $end = explode(" ", $event['end']);
      if($start[1] == '00:00:00'){
        $start = $start[0];
      }else{
        $start = $event['start'];
      }
      if($end[1] == '00:00:00'){
        $end = $end[0];
      }else{
        $end = $event['end'];
      }
    ?>
      {
        id: '<?php echo $event['id']; ?>',
        title: '<?php echo $event['title']; ?>',
        start: '<?php echo $start; ?>',
        end: '<?php echo $end; ?>',
        color: '<?php echo $event['color']; ?>',
      },
    <?php endforeach; ?>
    ]
  });

  function edit(event){
    start = event.start.format('YYYY-MM-DD HH:mm:ss');
    if(event.end){
      end = event.end.format('YYYY-MM-DD HH:mm:ss');
    }else{
      end = start;
    }

    id =  event.id;

    Event = [];
    Event[0] = id;
    Event[1] = start;
    Event[2] = end;

    $.ajax({
     url: 'calendar1/editEventDate.php',
     type: "POST",
     data: {Event:Event},
     success: function(rep) {
        if(rep == 'OK'){
          alert('Registro Guardado en nuevo día.');
        }else{
          alert('Registro sin guardar. Intente de nuevo.');
        }
      }
    });
  }

});
$('document').ready(function() {
      $('#title').autocomplete({
        source : 'buspacREH.php'
      });
});
</script>
