<form action="" method="post">
    <br>
    <input type="date" name="fecha" placeholder="Fecha:">
    <br>
  <br>
     <input type="text" name="total" placeholder="Total:"> <br>
     <br>
      Tipo de pago: <br>
     <select name="tipo_pago">
        <option value="1">...</option>
        <option value="2">...</option>
     </select> <br>  
     <br>
     <input type="submit" name="alta" value="Guardar Venta">
</form>
<?php 
     require_once ("venta.php");
        $obj = new Venta();
     if (isset($_POST["alta"]))
     {      # code...
        $fecha = $_POST["fecha"];
        $total = $_POST["total"];
        $tipo_pago = $_POST["tipo_pago"];
        $obj->alta($fecha,$total,$tipo_pago);
        echo "<h2>Venta Registrada</h2>";
     }
 ?>

 <table>
    <tr>
        <th>Fecha</th>
        <th>Total</th>
        <th>Tipo de pago</th>
    </tr>
    <?php 
      $res = $obj->consulta();
      while ($fila = $res->fetch_assoc())
       {    # code...
           echo "<tr>";
           echo "<td>".$fila["fecha"]."</td>";
           echo "<td>".$fila["total"]."</td>";
           echo "<td>".$fila["tipo_pago"]."</td>";
           echo "<tr>";
       }
     ?>
 </table>