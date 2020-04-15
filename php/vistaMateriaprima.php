<?php 
    require_once("materiaprima.php");
    $obj=new Materiaprima();
if(!isset($_POST["modificar"])){ 
 ?>
 <div>
     <form method="get" action="http://localhost/RPSI/php/reporteMateriaprima.php "><button type="submit">Reporte Materia Prima</button></form>
 </div>
<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="materiaprima" name="tabla">
    <input type="hidden" value="precio" name="dato"> 
    <input type="hidden" value="stock" name="encabezado">  
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
  Tipo: <br>
  <select name="tipo">
    <option value="1">...</option>
    <option value="2">...</option>
  </select> <br>
     <br>
     <input type="text" name="descripcion" placeholder="Descripcion:"> <br>
     <br>
     <input type="text" name="precio" placeholder="Precio:"> <br>
     <br>
     <input type="text" name="stock" placeholder="Stock:"> <br>
     <br>
     <input type="text" name="existencias" placeholder="Existencias:"> <br>
  <input type="submit" name="alta" value="Guardar Materia Prima">
</form>
<?php }else{ 
    $res = $obj->buscar($_POST["id"]);
    $fila = $res->fetch_assoc();
?>
<form action="" method="post"><br>
  <input type="text" name="nombre" placeholder="Nombre:" value = '<?php echo $fila["nombre"] ?>'><br>
     <input type="text" name="tipo" placeholder="Tipo: " value= '<?php echo $fila["tipo"] ?>'><br>
     <input type="text" name="descripcion" placeholder="Descripcion:" value = '<?php echo $fila["descripcion"] ?>'> <br>
     <br>
     <input type="text" name="precio" placeholder="Precio:" value = '<?php echo $fila["precio"] ?>'> <br>
     <br>
     <input type="text" name="stock" placeholder="Stock:" value = '<?php echo $fila["stock"] ?>'> <br>
     <br>
     <input type="text" name="existencias" placeholder="Existencias:" value = '<?php echo $fila["existencias"] ?>'> <br>

  <input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
<input type="submit" name="mod" value="Materia Modificado">
</form>
<?php 
}
     if (isset($_POST["alta"]))
     {   
      $nombre = $_POST["nombre"];
      $tipo = $_POST["tipo"];
      $descripcion = $_POST["descripcion"];
      $precio = $_POST["precio"];
      $stock = $_POST["stock"];
      $existencias = $_POST["existencias"];
      $obj->alta($nombre,$tipo,$descripcion,$precio,$stock,$existencias);
      echo "<h2>Materia Prima registrada</h2>";
     }
     if(isset($_POST["mod"])){
      $nombre = $_POST["nombre"];
      $tipo = $_POST["tipo"];
      $descripcion = $_POST["descripcion"];
      $precio = $_POST["precio"];
      $stock = $_POST["stock"];
      $existencias = $_POST["existencias"];
      $id = $_POST["id"];
      $obj->modificar($nombre,$tipo,$descripcion,$precio,$stock,$existencias,$id);
      echo "<h2>Materia Prima Modificada</h2>";
     }
      if (isset($_POST["eliminar"])) {
          echo "<script>
          var opcion = confirm('¿Deseas eliminar la materia?');
          if (opcion===true) {
              window.location.href = 'home.php?sec=materia&el=".$_POST["id"]."';
          }
          </script>";
     }
          if(isset($_GET["el"])){
               $obj->eliminar($_GET["el"]);
               //echo "<h2>Materia eliminado</h2>";
               echo "<script>
               alert('Materia eliminado');
               window.location.href = 'home.php?sec=materia';
               </script>";
               //header("Location: index.php");
          }
 ?>

 <table>
  <tr>
    <th>Nombre</th>
    <th>Tipo</th>
          <th>Descripcion</th>
          <th>Precio</th>
          <th>Stock</th>
          <th>Existencias</th>
          <th>Eliminar</th>
          <th>Modificar</th>
  </tr>
  <?php 
    $res = $obj->consulta();
    while ($fila = $res->fetch_assoc())
     {  # code...
         echo "<tr>";
         echo "<td>".$fila["nombre"]."</td>";
         echo "<td>".$fila["tipo"]."</td>";
             echo "<td>".$fila["descripcion"]."</td>";
             echo "<td>".$fila["precio"]."</td>";
             echo "<td>".$fila["stock"]."</td>";
             echo "<td>".$fila["existencias"]."</td>";
   ?>
   <td>
                  <form action="" method="post">
                    <input type="hidden" value="<?php echo $fila['IDmateriaprima'] ?>" name="id">
                    <input type="submit" name="eliminar" value="Eliminar">
                       
                  </form>
             </td>
             <td>
          <form action="" method="post">
            <input type="hidden" value="<?php echo $fila['IDmateriaprima']?>" name="id">
            <input type="submit" name="modificar" value="Modificar">
          </form>
        </td>
             <?php
         echo "<tr>";
     }
   ?>
 </table>