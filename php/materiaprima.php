<?php 

require_once("conexion.php");
class Materiaprima extends Conexion{

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
		return $this->obtenerSentencia();
	}
	public function modificar($nombre,$tipo,$descripcion,$precio,$stock,$existencias,$id){
		$this->sentencia="UPDATE FROM materiaprima SET nombre='$nombre',tipo='$tipo',descripcion='$descripcion',precio='$precio',stock='$stock',existencias='$existencias' WHERE IDmateriaprima='$id'";
		$this->ejecutarSentencia();
	}
	public function buscar($id){
        $this->sentencia = "SELECT * FROM materiaprima WHERE IDmateriaprima=$id";
        return $this->obtenerSentencia();
    }

}

 ?>