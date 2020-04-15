<?php 

require_once("conexion.php");
class Pedido extends Conexion{

	public function alta($fecha,$precio,$cantidad,$direccion){
		$this->sentencia ="INSERT INTO pedido VALUES (null,'$fecha','$precio','$cantidad','$direccion')";
		$this->ejecutarSentencia();
	}

	public function eliminar($id){
		$this->sentencia = "DELETE FROM pedido WHERE IDpedido=$id";
		$this->ejecutarSentencia();
	}

	public function consulta(){
		$this->sentencia = "SELECT * FROM pedido";
		return $this->obtenerSentencia();
	}
	public function modificar($fecha,$IDcliente,$precio,$cantidad,$direccion,$IDproducto,$id){
		$this->sentencia="UPDATE FROM pedido SET fecha='$fecha',IDcliente='$IDcliente',precio='$precio',cantidad='$cantidad',direccion='$direccion',IDproducto='$IDproducto' WHERE IDpedido='$id'";
		$this->ejecutarSentencia();
	}
	public function buscar($id){
        $this->sentencia = "SELECT * FROM pedido WHERE IDpedido=$id";
        return $this->obtenerSentencia();
    }

}

 ?>