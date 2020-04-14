<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="mobiliario" name="tabla">
    <input type="hidden" value="cantidad" name="dato"> 
    <input type="hidden" value="tipo" name="encabezado">  
    <input type="submit" name="grafica" value="Graficar">    
  </form>  
</div>

<?php 
  if (isset($_POST["grafica"])) {
    require_once("php/grafica.php");
  }
?>
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
     if (isset($_POST["eliminar"])) {
          echo "<script>
          var opcion = confirm('¿Deseas eliminar el Mobiliario?');
          if (opcion===true) {
              window.location.href = 'index.php?el=".$_POST["id"]."';
          }
          </script>";
     }
          if(isset($_GET["el"])){
               $obj->eliminar($_GET["el"]);
               //echo "<h2>Usuario eliminado</h2>";
               echo "<script>
               alert('Mobiliario eliminado');
               window.location.href = 'index.php';
               </script>";
               //header("index.php");
          }
 ?>

 <table>
 	<tr>
 		<th>Nombre</th>
 		<th>Descripcion</th>
    <th>Cantidad</th>
    <th>Nic</th>
    <th>Tipo</th>
    <th>Eliminar</th>
    <th>Modificar</th>
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
 	 ?>
   <td>
                  <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDmobiliario'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                       
                  </form>
             </td>
             <?php
         echo "<tr>";
     }
   ?>
 </table>