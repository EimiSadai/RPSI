<?php
require_once ("remplazo.php");
        $obj = new Remplazo();
        if(!isset($_POST["modificar"])){ 
?>
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
<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
?>
<form action="" method="post">
<input type="text" name="IDmobiliario" placeholder="Mobiliario: " value= '<?php echo $fila["IDmobiliario"] ?>'><br>
<input type="text" name="fecha" placeholder="Fecha: " value= '<?php echo $fila["fecha"] ?>'><br>
<input type="text" name="costo" placeholder="Costo: " value= '<?php echo $fila["costo"] ?>'><br>
<input type="text" name="descripcion" placeholder="Descripcion: " value= '<?php echo $fila["descripcion"] ?>'><br>
</select><br>
<input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Modificar Remplazo">
</form>
<?php 
}
    if(isset($_POST["alta"])){
    
    $fecha=$_POST["fecha"];
    $costo=$_POST["costo"];
    $descripcion=$_POST["descripcion"];
    require_once("remplazo.php");
    $obj=new Remplazo();
    $obj->alta($fecha,$costo,$descripcion);
    echo"<h2>Remplazo Guardado<h2>";
}
     if(isset($_POST["mod"])){
    $IDmobiliario=$_POST["IDmobiliario"];
    $fecha=$_POST["fecha"];
    $costo=$_POST["costo"];
    $descripcion=$_POST["descripcion"];
    $id = $_POST["id"];
    $obj->modificar($IDmobiliario,$fecha,$costo,$descripcion,$id);
    echo "<h2>Remplazo modificado</h2>";
}
     if (isset($_POST["eliminar"])) {
          echo "<script>
          var opcion = confirm('¿Deseas eliminar el Remplazo?');
          if (opcion===true) {
              window.location.href = 'home.php?sec=remplazo&el=".$_POST["id"]."';
          }
          </script>";
     }
           if(isset($_GET["el"])){
               $obj->eliminar($_GET["el"]);
               //echo "<h2>Usuario eliminado</h2>";
               echo "<script>
               alert('Remplazo eliminado');
               window.location.href = 'home.php?sec=remplazo';
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
     ?>
     <td>
                  <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDremplazo'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                       
                  </form>
             </td>
             <td>
          <form action="" method="post">
            <input type="hidden" value="<?php echo $fila['IDremplazo']?>" name="id">
            <input type="submit" name="modificar" value="Modificar">
          </form>
        </td>
             <?php
         echo "<tr>";
     }
   ?>
 </table>