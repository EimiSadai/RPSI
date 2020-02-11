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
 ?>

 <table>
    <tr>
        <th>Fecha</th>
        <th>Costo</th>
        <th>Descripcion</th>
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
       }
     ?>
 </table>