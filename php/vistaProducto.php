<form action="" method="post">
    <br>
	<input type="text" name="nombre" placeholder="Nombre:">
	<br>
  <br>
     <input type="text" name="descripcion" placeholder="Descripcion:"> <br>
     <br>
     <input type="text" name="preciov" placeholder="Precio Venta:"> <br>
     <br>
      <input type="text" name="precioc" placeholder="Precio Compra:"> <br>
     <br>
     <input type="text" name="cantidad" placeholder="Cantidad:"> <br>  
      <input type="text" name="cantmin" placeholder="Cantidad Minima:"> <br>
      <input type="text" name="cantmax" placeholder="Cantidad Maxima:"> <br>
      Categoria: <br>
     <select name="categoria">
        <option value="1">...</option>
        <option value="2">...</option>
     </select> <br>  
     <br>
	 <input type="submit" name="alta" value="Guardar Producto">
</form>
<?php 
     require_once ("producto.php");
     	$obj = new Producto();
     if (isset($_POST["alta"]))
     {  	# code...
     	  $nombre = $_POST["nombre"];
     	  $descripcion = $_POST["descripcion"];
        $preciov = $_POST["preciov"];
        $precioc = $_POST["precioc"];
        $cantidad = $_POST["cantidad"];
        $cantmin = $_POST["cantmin"];
        $cantmax = $_POST["cantmax"];
        $categoria = $_POST["categoria"];
     	$obj->alta($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria);
     	echo "<h2>Producto Registrado</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Nombre</th>
 		<th>Descripcion</th>
        <th>Precio Venta</th>
        <th>Precio Compra</th>
        <th>Cantidad</th>
        <th>Cantidad Minima</th>
        <th>Cantidad Maxima</th>
        <th>Categoria</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["nombre"]."</td>";
 	   	   echo "<td>".$fila["descripcion"]."</td>";
           echo "<td>".$fila["preciov"]."</td>";
           echo "<td>".$fila["precioc"]."</td>";
           echo "<td>".$fila["cantidad"]."</td>";
           echo "<td>".$fila["cantmin"]."</td>";
           echo "<td>".$fila["cantmax"]."</td>";
           echo "<td>".$fila["categoria"]."</td>";
           echo "<tr>";
 	   }
 	 ?>
 </table>