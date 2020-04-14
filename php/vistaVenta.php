<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="venta" name="tabla">
    <input type="hidden" value="total" name="dato"> 
    <input type="hidden" value="tipo_pago" name="encabezado">  
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
     <input type="text" name="total" placeholder="Total:"> <br>
     <br>
      Tipo de pago: <br>
     <select name="tipo_pago">
        <option value="1">...</option>
        <option value="2">...</option>
     </select> <br>  
     <input type="text" placeholder="Cliente" name="id_cliente"> <br>
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
        $IDcliente = $_POST["id_cliente"];
        $obj->alta($fecha,$IDcliente,$total,$tipo_pago);
        echo "<h2>Venta Registrada</h2>";
     }
    if (isset($_POST["mod"]))
     {    
      $fecha = $_POST["fecha"];
      $total = $_POST["total"];
      $tipo_pago = $_POST["tipo_pago"];
      $IDcliente = $_POST["id_cliente"];
      $id = $_POST["id"];

      $obj->modificar($fecha,$total,$tipo_pago,$IDcliente);
      echo "<h2>Venta modificado</h2>";
     }
     if (isset($_POST["eliminar"])) {
          echo "<script>
          var opcion = confirm('¿Deseas eliminar la venta?');
          if (opcion===true) {
              window.location.href = 'home.php?sec=venta&el=".$_POST["id"]."';
          }
          </script>";
     }
          if(isset($_GET["el"])){
               $obj->eliminar($_GET["el"]);
               //echo "<h2>Usuario eliminado</h2>";
               echo "<script>
               alert('Venta eliminado');
               window.location.href = 'home.php?sec=venta';
               </script>";
               //header("Location: index.php");
          }
 ?>

 <table>
    <tr>
        <th>Fecha</th>
        <th>Total</th>
        <th>Tipo de pago</th>
        <th>Eliminar</th>
        <th>Modificar</th>
    </tr>
    <?php 
      $res = $obj->consulta();
      while ($fila = $res->fetch_assoc())
       {    # code...
           echo "<tr>";
           echo "<td>".$fila["fecha"]."</td>";
           echo "<td>".$fila["total"]."</td>";
           echo "<td>".$fila["tipo_pago"]."</td>";
     ?>
             <td>
                  <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDventa'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                       
                  </form>
             </td>
             <td>
                  <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDventa'] ?>" name="id">
                    <input type="submit" name="modificar" value="Modificar">
                       
                  </form>
             </td>

             <?php
         echo "</tr>";
     }
   ?>
 </table>