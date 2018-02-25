<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Axis - asistencia</title>
  </head>
  <link rel="stylesheet" href="style.css">
  <body>
    <?php include_once("class.lista.php") ?>
    <h1><span class="blue">&lt;</span>AXIS<span class="blue">&gt;</span> <span class="yellow">Asistencia</span></h1>
    <h2>lista de asistencia para las conferencias</h2>
    <table class="container">
    	<thead>
    		<tr>
    			<th><h1>Nombre</h1></th>
    			<th><h1>Dia 1</h1></th>
    			<th><h1>Dia 2</h1></th>
    			<th><h1>Dia 3</h1></th>
    		</tr>
    	</thead>
    	<tbody>
    		<?php $lista->getLista(); ?>
    	</tbody>
    </table>
<script type="text/javascript">
setInterval(function(){
$("#grid1").trigger("reloadGrid");
}, 10000);
</script>
  </body>
</html>
