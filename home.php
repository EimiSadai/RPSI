<?php
    session_start();
    if (!isset($_SESSION["autenticado"])) {
    	header("Location: index.php");
     } 
?>
<!DOCTYPE html>
<html>
<head>
	<title>ERP</title>
	<link rel="stylesheet" href="css/estilos.css">
	<script src="js/Chart.min.js"></script>
</head>
<body>
	<section>
		<nav>
			<h2>Bienvenido: <?php echo $_SESSION["usuario"]; ?></h2><br>
			<ul>
				<a href=""><li>Inicio</li></a>
				<a href="?sec=usu"><li>Usuario</li></a>	
				<a href="?sec=venta"><li>Venta</li></a>
				<a href="?sec=remplazo"><li>Remplazo</li></a>
				<a href="?sec=proveedor"><li>Proveedor</li></a>
				<a href="?sec=producto"><li>Producto</li></a>
				<a href="?sec=pedido"><li>Pedido</li></a>
				<a href="?sec=mobiliario"><li>Mobiliario</li></a>
				<a href="?sec=materia"><li>Materia prima</li></a>
				<a href="?sec=mantenimiento"><li>Mantenimiento</li></a>
				<a href="?sec=cerrar"><li>Cerrar sesion</li></a>			
			</ul>
		</nav>
		<article>
		<?php 
	if (isset($_GET["sec"])) {
		$sec = $_GET["sec"];
		switch($sec){
			case 'usu':
			    require_once("php/vistaUsuario.php");
				break;
			case 'venta':
			    require_once("php/vistaVenta.php");
				break;
			case 'remplazo':
			    require_once("php/vistaRemplazo.php");
				break;
			case 'proveedor':
			    require_once("php/vistaProveedor.php");
				break;
			case 'producto':
			    require_once("php/vistaProducto.php");
				break;
			case 'pedido':
			    require_once("php/vistaPedido.php");
				break;
			case 'usu':
			    require_once("php/vistaUsuario.php");
				break;
			case 'mobiliario':
			    require_once("php/vistaMobiliario.php");
				break;
			case 'materia':
			    require_once("php/vistaMateriaprima.php");
				break;
			case 'mantenimiento':
			    require_once("php/vistaMantenimiento.php");
				break;
			case 'cerrar':
			    session_destroy();
			    header("Location: index.php");
				break;

		}
	}
		?>
	</article>
	</section>
	
</body>
</html>

