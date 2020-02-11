<form action="" method="post">
    <br>
	<input type="text" name="nombre" placeholder="Nombre:">
	<br>
  <br>
     <input type="text" name="descripcion" placeholder="Descripcion:"> <br>
     <br>
     <input type="text" name="cantidad" placeholder="Cantidad:"> <br>
     <br>
     <input type="text" name="nic" placeholder="Nic:"> <br>
	Tipo: <br>
	<select name="tipo">
		<option value="1">...</option>
		<option value="2">...</option>
	</select> <br>   
	<input type="submit" name="alta" value="Guardar Mobiliario">
</form>
<?php 
     require_once ("mobiliario.php");
     	$obj = new Mobiliario();
     if (isset($_POST["alta"]))
     {  	# code...
     	$nombre = $_POST["nombre"];
     	$descripcion = $_POST["descripcion"];
        $cantidad = $_POST["cantidad"];
        $nic = $_POST["nic"];
        $tipo = $_POST["tipo"];
     	$obj->alta($nombre,$descripcion,$cantidad,$nic,$tipo);
     	echo "<h2>Mobiliario Registrado</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Nombre</th>
 		<th>Descripcion</th>
    <th>Cantidad</th>
    <th>Nic</th>
    <th>Tipo</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["nombre"]."</td>";
 	   	   echo "<td>".$fila["descripcion"]."</td>";
         echo "<td>".$fila["cantidad"]."</td>";
         echo "<td>".$fila["nic"]."</td>";
         echo "<td>".$fila["tipo"]."</td>";
         echo "<tr>";
 	   }
 	 ?>
 </table>