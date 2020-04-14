<div id="grafica">
  <form action="" method="post">
    <input type="hidden" value="producto" name="tabla">
    <input type="hidden" value="cantidad" name="dato">
    <input type="hidden" value="nombre" name="encabezado">
    <input type="submit" name="grafica" value="Graficar">
  </form>
</div>
<?php 
  if(isset($_POST["grafica"])){
    require_once("php/grafica.php");
  }
 ?>

<?php 
  require_once("producto.php");
  $obj = new Producto();
  if (!isset($_POST["modificar"])) { 
  ?>
<form action="" method="post">
  <h3>Producto</h3>
  <input type="text" name="nombre" placeholder="Nombre">
  <br>
  <input type="text" name="descripcion" placeholder="Descripcion"> 
  <br>    
  <input type="text" name="preciov" placeholder="Precio Venta"> 
  <br>
  <input type="text" name="precioc" placeholder="Precio Compra"> 
  <br>  
  <input type="text" name="cantidad" placeholder="Cantidad"> 
  <br>
  <input type="text" name="cantmin" placeholder="Cantidad Minima"> 
  <br>
  <input type="text" name="cantmax" placeholder="Cantidad Maxima"> 
  <br>
  Categoria: <br>
     <select name="categoria">
        <option value="1">...</option>
        <option value="2">...</option>
     </select> <br>  
     <br>
  <input type="submit" name="alta" value="Guardar Producto">

</form>

<?php }else{ 
  $res = $obj->buscar($_POST["id"]);

  $fila = $res->fetch_assoc();
  ?>
  <form action="" method="post">
    <h2>Productos</h2>
  <input type="text" name="nombre" placeholder="Nombre:" value="<?php echo $fila['nombre']; ?>">
  <br>
  <input type="text" name="descripcion" placeholder="Descripcion" value="<?php echo $fila['descripcion']; ?>"> <br>
  <br>
  <input type="text" name="preciov" placeholder="preciov" value="<?php echo $fila['preciov']; ?>"> <br>
  <br>
  <input type="text" name="preciov" placeholder="preciov" value="<?php echo $fila['precioc']; ?>"> <br>
  <br>
  <input type="text" name="cantidad" placeholder="Cantidad" value="<?php echo $fila['cantidad']; ?>"> <br>
  <br>
  <input type="text" name="cantmin" placeholder="cantmin" value="<?php echo $fila['cantmin']; ?>"> <br>
  <br>
  <input type="text" name="cantmax" placeholder="cantmax" value="<?php echo $fila['cantmax']; ?>"> <br>
  <br>
  <input type="text" name="categoria" placeholder="categoria" value="<?php echo $fila['categoria']; ?>"> <br>
  <br>
  <input type="hidden" value='<?php echo $_POST["id"] ?>' name="id">
  <input type="submit" name="mod" value="Modificar Usuario">

</form> 

<?php
    }
    require_once("producto.php");
    $obj = new Producto();
  if(isset($_POST["alta"])){
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $preciov = $_POST["preciov"];
    $precioc = $_POST["precioc"];
    $cantidad = $_POST["cantidad"];
    $cantmin = $_POST["cantmin"];
    $cantmax = $_POST["cantmax"];
    $categoria = $_POST["categoria"]; 
    $obj-> alta($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria);
    echo "<script> 
        alert('Producto Registrado');
        window.location.href = 'home.php?sec=prod';
        </script>";
  }
  if(isset($_POST["mod"])){
    $nombre = $_POST["nombre"];
    $descripcion = $_POST["descripcion"];
    $preciov = $_POST["preciov"];
    $precioc = $_POST["precioc"];
    $cantidad = $_POST["cantidad"];
    $cantmin = $_POST["cantmin"];
    $cantmax = $_POST["cantmax"];
    $categoria = $_POST["categoria"]; 
    $id = $_POST["id"];
    $obj-> modificar($nombre,$descripcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria,$id);
    echo "<script> 
        alert('Producto Modificado');
        window.location.href = 'home.php?sec=prod';
        </script>";
  }
  if (isset($_POST["eliminar"])) {
    echo "<script> 
      var opcion = confirm('¿Deseas eliminar el Producto?');
      if(opcion===true){
        window.location.href = 'home.php?sec=prod&el=".$_POST["id"]."';
      }
    </script>";
  }
  if (isset($_GET["el"])) {
    $obj-> baja($_GET["el"]);
    echo "<script>
    alert('Producto eliminando');
    window.location.href = 'home.php?sec=prod';
    </script>";
  }
?>
<table>
  <tr>
    <th>Nombre</th>
    <th>Descripcion</th>
    <th>Preciov</th>
    <th>Precioc</th>
    <th>Cantidad</th>
    <th>Cantmin</th>
    <th>Cantmax</th>
    <th>Categoria</th>
    <th>Modificar</th>
    <th>Eliminar</th>
  </tr>
  <?php 
    $res = $obj-> consulta();
    while ($fila = $res-> fetch_assoc()) {
      echo "<td>".$fila["nombre"]."</td>";
      echo "<td>".$fila["descripcion"]."</td>";
      echo "<td>".$fila["preciov"]."</td>";
      echo "<td>".$fila["precioc"]."</td>";
      echo "<td>".$fila["cantidad"]."</td>";
      echo "<td>".$fila["cantmin"]."</td>";
      echo "<td>".$fila["cantmax"]."</td>";
      echo "<td>".$fila["categoria"]."</td>";
      ?>
        <td>
          <form action="" method="post">
            <input type="hidden" value="<?php echo $fila['IDproducto']?>" name="id">
            <input type="submit" name="eliminar" value="Eliminar">
          </form>
        </td>
        <td>
          <form action="" method="post">
            <input type="hidden" value="<?php echo $fila['IDproducto']?>" name="id">
            <input type="submit" name="modificar" value="Modificar">
          </form>
        </td>
      <?php
      echo "</tr>";
    }
   ?>
</table>
