<form action="" method="post">
    <br>
	<input type="text" name="nombre" placeholder="Nombre:">
	<br>
  <br>
     <input type="text" name="telefono" placeholder="Telefono:"> <br>
     <br>
     <input type="text" name="direccion" placeholder="Direccion:"> <br>
     <br>
      <input type="text" name="correo" placeholder="Correo:"> <br>
     <br>
     <input type="text" name="rfc" placeholder="RFC:"> <br>   
     <br>
	 <input type="submit" name="alta" value="Guardar Proveedor">
</form>
<?php 
     require_once ("proveedor.php");
     	$obj = new Proveedor();
     if (isset($_POST["alta"]))
     {  	# code...
     	  $nombre = $_POST["nombre"];
     	  $telefono = $_POST["telefono"];
          $direccion = $_POST["direccion"];
          $correo = $_POST["correo"];
          $rfc = $_POST["rfc"];
     	  $obj->alta($nombre,$telefono,$direccion,$correo,$rfc);
     	  echo "<h2>Proveedor Registrado</h2>";
     }
 ?>

 <table>
 	<tr>
 		<th>Nombre</th>
 		 <th>Telefono</th>
        <th>Direcccion</th>
        <th>Correo</th>
        <th>RFC</th>
 	</tr>
 	<?php 
 	  $res = $obj->consulta();
 	  while ($fila = $res->fetch_assoc())
 	   {	# code...
 	   	   echo "<tr>";
 	   	   echo "<td>".$fila["nombre"]."</td>";
 	   	   echo "<td>".$fila["telefono"]."</td>";
         echo "<td>".$fila["direccion"]."</td>";
         echo "<td>".$fila["correo"]."</td>";
         echo "<td>".$fila["rfc"]."</td>";
         echo "<tr>";
 	   }
 	 ?>
 </table>