<?php
require_once(dirname(__DIR__)."/config.php");

class InteresesBD {

	public static function insertaInteres($nick,$tipo,$idInteres){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "INSERT INTO `intereses`(`IDUSUARIO`, `TIPO`, `IDINTERES`) VALUES ('$nick','$tipo','$idInteres')";
		$conn->query($query);
	}

	public static function compruebaInteres($nick, $idInteres){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT * FROM intereses WHERE IDUSUARIO = '$nick' and IDINTERES = '$idInteres'";
		$datos = $conn->query($query);
		$datos = $datos->fetch_assoc();
		return $datos;
	}

	public static function eliminaInteres($nick, $idInteres){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "DELETE FROM `intereses` WHERE `intereses`.`IDUSUARIO` = '$nick' AND `intereses`.`IDINTERES` = '$idInteres' ";
		$conn->query($query);
	}

	public static function eliminarIntereses($nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$nick = mysqli_real_escape_string($conn,$nick);
		$query = "DELETE FROM intereses WHERE IDUSUARIO = '$nick'";
		$conn->query($query);
	}

	public static function buscaIntereses($nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT * FROM intereses WHERE IDUSUARIO = '$nick'";
		$datos = $conn->query($query);
		$datos = $datos->fetch_all();
		return $datos;
	}
}

?>