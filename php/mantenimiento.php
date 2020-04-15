<?php 

require_once("conexion.php");
class Mantenimiento extends Conexion{

	public function alta($fecha_man,$area,$IDmob,$costo_man){
		$this->sentencia ="INSERT INTO mantenimiento VALUES (null,'$fecha_man','$area','$IDmob','$costo_man')";
		$this->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM mantenimiento WHERE IDmantenimiento=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM mantenimiento";
		return $this->obtenerSentencia();
	}
	public function modificar($fecha_man,$area,$costo_man,$id){
		$this->sentencia="UPDATE FROM mantenimiento SET fecha_man='$fecha_man',area='$area',costo_man='$costo_man' WHERE IDmantenimiento='$id'";
		$this->ejecutarSentencia();
	}
	public function buscar($id){
        $this->sentencia = "SELECT * FROM mantenimiento WHERE IDmantenimiento=$id";
        return $this->obtenerSentencia();
    }

}

 ?>