<form action="" method="post">
    <br>
	<input type="text" name="nombre" placeholder="Nombre:">
	<br>
	Tipo: <br>
	<select name="tipo">
		<option value="1">...</option>
		<option value="2">...</option>
	</select> <br>
     <br>
     <input type="text" name="descripcion" placeholder="Descripcion:"> <br>
     <br>
     <input type="text" name="precio" placeholder="Precio:"> <br>
     <br>
     <input type="text" name="stock" placeholder="Stock:"> <br>
     <br>
     <input type="text" name="existencias" placeholder="Existencias:"> <br>
	<input type="submit" name="alta" value="Guardar Materia Prima">
</form>
<?php 
     require_once ("materiaprima.php");
     	$obj = new Materiaprima();
     if (isset($_POST["alta"]))
     {  	# code...
     	$nombre = $_POST["nombre"];
     	$tipo = $_POST["tipo"];
      $descripcion = $_POST["descripcion"];
      $precio = $_POST["precio"];
      $stock = $_POST["stock"];
      $existencias = $_POST["existencias"];
     	$obj->alta($nombre,$tipo,$descripcion,$precio,$stock,$existencias);
     	echo "<h2>Materia Prima registrada</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Nombre</th>
 		<th>Tipo</th>
          <th>Descripcion</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Existencias</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["nombre"]."</td>";
 	   	   echo "<td>".$fila["tipo"]."</td>";
             echo "<td>".$fila["descripcion"]."</td>";
             echo "<td>".$fila["precio"]."</td>";
             echo "<td>".$fila["stock"]."</td>";
             echo "<td>".$fila["existencias"]."</td>";

 	   	   echo "<tr>";
 	   }
 	 ?>
 </table>