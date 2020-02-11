<form action="" method="post">
    <br>
	<input type="date" name="fecha_man" placeholder="Fecha de mantenimiento:">
	<br>
	<br>
	<input type="text" name="area" placeholder="Area:"> <br>
     <input type="text" name="costo_man" placeholder="Costo de mantenimiento:">
     <br>
	<input type="submit" name="alta" value="Guardar Mantenimiento">
</form>
<?php 
     require_once ("mantenimiento.php");
     	$obj = new Mantenimiento();
     if (isset($_POST["alta"]))
     {  	# code...
     	$fecha_man = $_POST["fecha_man"];
     	$area = $_POST["area"];
     	$costo_man = $_POST["costo_man"];
     	$obj->alta($fecha_man,$area,$costo_man);
     	echo "<h2>Mantenimiento registrado</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Fecha de mantenimiento</th>
 		<th>Area</th>
 		<th>Costo de mantenimiento</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["fecha_man"]."</td>";
 	   	   echo "<td>".$fila["area"]."</td>";
 	   	   echo "<td>".$fila["costo_man"]."</td>";
 	   	   echo "<tr>";
 	   }
 	 ?>
 </table>