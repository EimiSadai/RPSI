<!DOCTYPE html>
<html>
<head>
	<title>ERP</title>
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>
<body>
      <form method="post" action="">
           <h2>Ingresar al sistema</h2><br>
           Usuario:
           <input type="text" name="user"><br>
           Password: 
           <input type="password" name="pass"><br>
           <input type="submit" value="Ingresar" name="ingresar"> 
      </form>

	<?php 
      if(isset($_POST["ingresar"])){
            require_once("php/usuario.php");
            $obj = new Usuario();
            $u = $_POST["user"];
            $p = $_POST["pass"];
            $resultado = $obj->comprobar($u,$p);
            if ($resultado==true){
                  session_start();
                  $_SESSION["usuario"] = $u;
                  $_SESSION["autenticado"] = true;
                  header("Location: home.php");
            }else{
                  echo"<h2>Usuario y/o Password incorrectos</h2>";
      
            }
      }
     /*
      require_once("php/vistaUsuario.php");  
      require_once("php/vistaMantenimiento.php");
      require_once("php/vistaMateriaprima.php");
      require_once("php/vistaMobiliario.php");
      require_once("php/vistaPedido.php");
      require_once("php/vistaProducto.php");
      require_once("php/vistaProveedor.php");
      require_once("php/vistaRemplazo.php");
      require_once("php/vistaVenta.php");
       */
      ?>

</body>
</html>
