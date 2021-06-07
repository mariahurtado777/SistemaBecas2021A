<?php
require_once("../Logica/LNPersonalBusqueda.php");
$objLNEstudianteBusqueda = new LNPersonalBusqueda();
//echo "Gestion: ".$_REQUEST['idGestion'];
$listaEstudiante = $objLNEstudianteBusqueda->entradaSalidaEstudiante($_REQUEST['ci']);
//var_dump($listaEstudiante);
//print_r($listaEstudiante)

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<title>estudiante</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
 
</head>

<script>
window.onload=function(){
                // Una vez cargada la página, el formulario se enviara automáticamente.
		document.forms["formregistro"].submit();
    }
    </script>

</script>


<body>
<center><h1>Registrar entrada</h1></center>


<h1>Bienvenido: </h1>

<?php 
     foreach($listaEstudiante as $estudiante){
   ?>
   <tr>
  	<td><?php  echo $estudiante['nombre']; ?></td>
      <?php }?>
  </tr>
<?php date_default_timezone_set("America/La_Paz");
 $dia=date("d");
 $mes=date("M");
 $anio=date("Y");
 $separador="/";
 $fecha=$dia.$separador.$mes.$separador.$anio;
// echo $fecha;

?>

  <br />
  <div class="container">
   <h3 align="center">Horario Trabajo</h3>
   <br />
   <form method="post"action="../Logica/LNRegistrarIngreso.php" name="formregistro" >
    <div class="table-repsonsive">
     <span id="error"></span>
     <table class="table table-bordered" id="item_table">
     
      <th>AsignacionBecaInstitucional
        <select name="idAsignacionBecaInstitucional" id="idAsignacionBecaInstitucional">
          <?php foreach($listaEstudiante as $lista)?>
          <option value="<?php echo($lista['asignacion'])?>"><?php echo($lista['area'])?></option>
      </th>
      <th>Fecha: <input type="date" name="fecha" id="fecha">
              <?php echo $fecha?>
            </th>    
       <th>Hora Inicio <input type="time" name="HoraInicio" id="HoraInicio"></th>
      </tr>
     </table>
     <div align="center">
       <button id="registrar" type="submit" name="submit" class="btn btn-info" data-toggle="modal" data-target="#exito">Registrar</button>
     </div>
    </div>
   </form>
  </div>
  <table>
  <tr>
    <th><h3 title = "Volver al inicio"> <a href="../index.html">Volver a Inicio</a></h3></th>
  <tr>
</table>

<div class="modal fade" id="exito" tabindex="-1" role="dialog" aria-labelledby="tituloExito" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloExito">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="resultado"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
</body>
</html>

<script>
$(document).ready(function(){
 
 $(document).on('click', '.add', function(){
  $('#item_table tbody tr:eq(0)').clone().removeClass('table table-bordered').appendTo('#item_table');
 });
 $(document).on('click','.eliminar',function(){
                var parent = $(this).parents().get(0);
                $(parent).remove();
            });

 $(document).on('click', '.remove', function(){
  $(this).closest('tr').remove();
 });

 $('#registrar').on('click',function(){
                var dia = $('#idDia').val();
                var horaInicio = $('#HoraInicio').val();
                var horaFin = $('#HoraFin').val();
               // alert(dia+horaInicio+horaFin);
                if(dia){
                        
                         $.ajax({
                          
                        type:'POST',
                        url:'../Logica/LNRegistrarHorario.php',
                        data:{idBecaInstitucional:idBecaInstitucional,
                              dia:dia,
                              horaInicio:horaInicio,
                              horaFin:horaFin },
                              })
                          .done(function(respuesta){
                            alert();
                              $("#resultado").html(respuesta);
                          })
                          .fail(function(){
                            alert();
                            $("#resultado").html('error');
                          }) ; 
                }else{
                    $('#resultado').html('error en el  registro');
            }
     });

 $('#RegistrarHorario').on('#registrar', function(event){
  var error = '';
  $('.dia').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Name at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.HoraInicio').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Enter Item Quantity at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  
  $('.HoraFin').each(function(){
   var count = 1;
   if($(this).val() == '')
   {
    error += "<p>Select Unit at "+count+" Row</p>";
    return false;
   }
   count = count + 1;
  });
  var form_data = $(this).serialize();
  if(error == '')
  {
   $.ajax({
    url:"../Logica/LNRegistrarHorario.php",
    method:"POST",
    data:form_data,
    success:function(data)
    {
     if(data == 'ok')
     {
      $('#RegistrarHorario').find("tr:gt(0)").remove();
      $('#error').html('<div class="alert alert-success">Item Details Saved</div>');
     }
    }
   });
  }
  else
  {
   $('#error').html('<div class="alert alert-danger">'+error+'</div>');
  }
 });
 
});
</script>

