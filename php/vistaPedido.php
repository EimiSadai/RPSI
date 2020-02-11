<form action="" method="post">
    <br>
	<input type="date" name="fecha" placeholder="Fecha:">
	<br>
  <br>
     <input type="text" name="precio" placeholder="Precio:"> <br>
     <br>
     <input type="text" name="cantidad" placeholder="Cantidad:"> <br>
     <br>
     <input type="text" name="direccion" placeholder="Direccion:"> <br>  
	<input type="submit" name="alta" value="Guardar Pedido">
</form>
<?php 
     require_once ("pedido.php");
     	$obj = new Pedido();
     if (isset($_POST["alta"]))
     {  	# code...
     	$fecha = $_POST["fecha"];
     	$precio = $_POST["precio"];
        $cantidad = $_POST["cantidad"];
        $direccion = $_POST["direccion"];
     	$obj->alta($fecha,$precio,$cantidad,$direccion);
     	echo "<h2>Pedido Registrado</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Fecha</th>
 		<th>Precio</th>
        <th>Cantidad</th>
        <th>Direccion</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["fecha"]."</td>";
 	   	   echo "<td>".$fila["precio"]."</td>";
           echo "<td>".$fila["cantidad"]."</td>";
           echo "<td>".$fila["direccion"]."</td>";
           echo "<tr>";
 	   }
 	 ?>
 </table>