<?php 
    require_once("mantenimiento.php");
    $obj=new Mantenimiento();
if(!isset($_POST["modificar"])){ 
 ?>
 <div>
     <form method="get" action="http://localhost/RPSI/php/reporteMantenimiento.php "><button type="submit">Reporte Mantenimiento</button></form>
 </div>
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
<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
?>
<form action="" method="post"><br>
 <input type="date" name="fecha_man" placeholder="Fecha de mantenimiento:" value= '<?php echo $fila["fecha_man"] ?>'><br>
  <br>
  <input type="text" name="area" placeholder="Area:"value= '<?php echo $fila["area"] ?>'> <br>
     <input type="text" name="costo_man" placeholder="Costo de mantenimiento:"value= '<?php echo $fila["costo_man"] ?>'><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Mantenimiento Modificado">
</form>

<?php 
}
     if (isset($_POST["alta"]))
     {    
      $fecha_man = $_POST["fecha_man"];
      $area = $_POST["area"];
      $costo_man = $_POST["costo_man"];
      $obj->alta($fecha_man,$area,$costo_man);
      echo "<h2>Mantenimiento registrado</h2>";
     }
     if(isset($_POST["mod"])){
      $fecha_man = $_POST["fecha_man"];
      $area = $_POST["area"];
      $costo_man = $_POST["costo_man"];
      $id = $_POST["id"];
      $obj->modificar($fecha_man,$area,$costo_man,$id);
      echo "<h2>Mantenimiento Modificado</h2>";
     }
     if (isset($_POST["eliminar"])) {
          echo "<script>
          var opcion = confirm('¿Deseas eliminar el Mobiliario?');
          if (opcion===true) {
              window.location.href = 'home.php?sec=mantenimiento&el=".$_POST["id"]."';
          }
          </script>";
     }
          if(isset($_GET["el"])){
               $obj->eliminar($_GET["el"]);
               //echo "<h2>Usuario eliminado</h2>";
               echo "<script>
               alert('Mobiliario eliminado');
               window.location.href = 'home.php?sec=mantenimiento';
               </script>";
               //header("Location: index.php");
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
     {  # code...
         echo "<tr>";
         echo "<td>".$fila["fecha_man"]."</td>";
         echo "<td>".$fila["area"]."</td>";
         echo "<td>".$fila["costo_man"]."</td>";
   ?>
      <td>
                  <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDmantenimiento'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                       
                  </form>
             </td>
             <td>
          <form action="" method="post">
            <input type="hidden" value="<?php echo $fila['IDmantenimiento']?>" name="id">
            <input type="submit" name="modificar" value="Modificar">
          </form>
        </td>
             <?php
             echo "<tr>";
        }
      ?>
 </table>