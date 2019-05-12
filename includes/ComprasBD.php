<?php
require("config.php");

class ComprasBD {

	public static function insertaCompra($nick,$tipo,$idCompra){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "INSERT INTO `compras`(`IDUSUARIO`, `TIPO`, `IDCOMPRA`) VALUES ('$nick','$tipo','$idCompra')";
		$conn->query($query);
	}

	public static function compruebaCompra($nick, $idCompra){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT * FROM compras WHERE IDUSUARIO = '$nick' and IDCOMPRA = '$idCompra'";
		$datos = $conn->query($query);
		$datos = $datos->fetch_assoc();
		return $datos;
	}

	public static function buscaCompras($nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT * FROM compras WHERE IDUSUARIO = '$nick'";
		$datos = $conn->query($query);
		$datos = $datos->fetch_all();
		return $datos;
	}
}

?>