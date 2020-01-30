<?php 

require_once("conexion.php");
class Producto{

	public function alta($nombre,$descipcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria){
		$this->sentencia ="INSERT INTO producto VALUES (null,'$nombre','$descripcion','$preciov','$precioc','$cantidad','$cantmin','$cantmax','$categoria')";
		$this->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM producto WHERE IDproducto=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM producto";
		return $this->obetenerSentencia();
	}
	public function modificar($nombre,$descipcion,$preciov,$precioc,$cantidad,$cantmin,$cantmax,$categoria){
		$this->sentencia="UPDATE FROM producto SET nombre='$nombre',descipcion='$descipcion',preciov='$preciov',precioc='$precioc',cantidad='$cantidad',cantmin='$cantmin',cantmax='$cantmax,categoria='$categoria WHERE IDproducto='$id'";
		$this->ejecutarSentencia();
	}

}

 ?>