<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="mantenimiento" name="tabla">
    <input type="hidden" value="area" name="dato"> 
    <input type="hidden" value="fecha_man" name="encabezado">  
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
     if (isset($_POST["eliminar"])) {
          echo "<script>
          var opcion = confirm('¿Deseas eliminar el Mantenimiento?');
          if (opcion===true) {
              window.location.href = 'index.php?el=".$_POST["id"]."';
          }
          </script>";
     }
           if(isset($_GET["el"])){
               $obj->eliminar($_GET["el"]);
               //echo "<h2>Usuario eliminado</h2>";
               echo "<script>
               alert('Mantenimiento eliminado');
               window.location.href = 'index.php';
               </script>";
               //header("index.php");
          }
 ?>

 <table>
 	<tr>
 		<th>Fecha de mantenimiento</th>
 		<th>Area</th>
 		<th>Costo de mantenimiento</th>
    <th>Eliminar</th>
    <th>Modificar</th>
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
 	 ?>
      <td>
                  <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDmantenimiento'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                       
                  </form>
             </td>
             <?php
             echo "<tr>";
        }
      ?>
 </table>