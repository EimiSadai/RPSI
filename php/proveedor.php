<?php 

require_once("conexion.php");
class Proveedor{

	public function alta($nombre,$telefono,$direccion,$correo,$rfc){
		$this->sentencia ="INSERT INTO proveedor VALUES (null,'$nombre','$telefono','$direccion','$correo','$rfc')";
		$this->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM proveedor WHERE IDproveedor=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM proveedor";
		return $this->obetenerSentencia();
	}
	public function modificar($nombre,$telefono,$direccion,$correo,$rfc){
		$this->sentencia="UPDATE FROM proveedor SET nombre='$nombre',telefono='$telefono',direccion='$direccion',correo='$correo',rfc='$rfc' WHERE IDproveedor='$id'";
		$this->ejecutarSentencia();
	}

}

 ?>