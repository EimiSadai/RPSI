<?php 

require_once("conexion.php");
class Materiaprima{

	public function alta($nombre,$tipo,$descripcion,$precio,$stock,$existencias){
		$this->sentencia ="INSERT INTO materiaprima VALUES (null,'$nombre','$tipo','$descripcion','$precio','$stock','$existencias')";
		$this->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM materiaprima WHERE IDmateriaprima=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM materiaprima";
		return $this->obetenerSentencia();
	}
	public function modificar($nombre,$tipo,$descripcion,$precio,$stock,$existencias){
		$this->sentencia="UPDATE FROM materiaprima SET nombre='$nombre',tipo='$tipo',descripcion='$descripcion',precio='$precio',stock='$stock',existencias='$existencias' WHERE IDmateriaprima='$id'";
		$this->ejecutarSentencia();
	}

}

 ?>