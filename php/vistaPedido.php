<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="pedido" name="tabla">
    <input type="hidden" value="cantidad" name="dato"> 
    <input type="hidden" value="precio" name="encabezado">  
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
     if (isset($_POST["eliminar"])) {
          echo "<script>
          var opcion = confirm('¿Deseas eliminar el Pedido?');
          if (opcion===true) {
              window.location.href = 'index.php?el=".$_POST["id"]."';
          }
          </script>";
     }
          if(isset($_GET["el"])){
               $obj->eliminar($_GET["el"]);
               //echo "<h2>Usuario eliminado</h2>";
               echo "<script>
               alert('Pedido eliminado');
               window.location.href = 'index.php';
               </script>";
               //header("index.php");
          }
 ?>

 <table>
 	<tr>
 		<th>Fecha</th>
 		<th>Precio</th>
    <th>Cantidad</th>
    <th>Direccion</th>
    <th>Eliminar</th>
    <th>Modificar</th>
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
 	 ?>
   <td>
                  <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDpedido'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                       
                  </form>
             </td>
             <?php
         echo "<tr>";
     }
   ?>
 </table>