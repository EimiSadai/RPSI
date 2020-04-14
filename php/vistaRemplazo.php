<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="remplazo" name="tabla">
    <input type="hidden" value="costo" name="dato"> 
    <input type="hidden" value="fecha" name="encabezado">  
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
     <input type="text" name="costo" placeholder="Costo:"> <br>
     <br>
     <input type="text" name="descripcion" placeholder="Descripcion:"> <br>
     <br>
       
     <br>
     <input type="submit" name="alta" value="Guardar Remplazo">
</form>
<?php 
     require_once ("remplazo.php");
        $obj = new Remplazo();
     if (isset($_POST["alta"]))
     {      # code...
        $fecha = $_POST["fecha"];
        $costo = $_POST["costo"];
        $descripcion = $_POST["descripcion"];
        $obj->alta($fecha,$costo,$descripcion);
        echo "<h2>Remplazo Registrado</h2>";
     }
     if (isset($_POST["eliminar"])) {
          echo "<script>
          var opcion = confirm('¿Deseas eliminar el Remplazo?');
          if (opcion===true) {
              window.location.href = 'index.php?el=".$_POST["id"]."';
          }
          </script>";
     }
           if(isset($_GET["el"])){
               $obj->eliminar($_GET["el"]);
               //echo "<h2>Usuario eliminado</h2>";
               echo "<script>
               alert('Remplazo eliminado');
               window.location.href = 'index.php';
               </script>";
               //header("index.php");
          }
 ?>

 <table>
    <tr>
        <th>Fecha</th>
        <th>Costo</th>
        <th>Descripcion</th>
         <th>Eliminar</th>
        <th>Modificar</th>
    </tr>
    <?php 
      $res = $obj->consulta();
      while ($fila = $res->fetch_assoc())
       {    # code...
           echo "<tr>";
           echo "<td>".$fila["fecha"]."</td>";
           echo "<td>".$fila["costo"]."</td>";
           echo "<td>".$fila["descripcion"]."</td>";
           echo "<tr>";
     ?>
     <td>
                  <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDremplazo'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                       
                  </form>
             </td>
             <?php
         echo "<tr>";
     }
   ?>
 </table>