<?php 

require_once("conexion.php");
class Remplazo extends Conexion{

	public function alta($fecha,$costo,$descripcion){
		$this->sentencia ="INSERT INTO remplazo VALUES (null,'$fecha','$costo','$descripcion')";
		$this->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM remplazo WHERE IDremplazo=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM remplazo";
		return $this->obtenerSentencia();
	}
	public function modificar($fecha,$costo,$descripcion){
		$this->sentencia="UPDATE FROM remplazo SET fecha='$fecha',costo='$costo',descripcion='$descripcion' WHERE IDremplazo='$id'";
		$this->ejecutarSentencia();
	}

}

 ?>