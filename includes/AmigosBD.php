<?php
require("config.php");

class AmigosBD {

	public static function insertaAmigos($nickA,$nickB){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "INSERT INTO `amigos`(`AMIGOA`, `AMIGOB`) VALUES ('$nickA','$nickB')";
		$conn->query($query);
	}

	public static function compruebaAmigos($nickA, $nickB){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT * FROM amigos WHERE (AMIGOA = '$nickA' and AMIGOB = '$nickB') OR (AMIGOA = '$nickB' and AMIGOB = '$nickA')";
		$datos = $conn->query($query);
		$datos = $datos->fetch_all();
		if ($datos)
			return true;
		else
			return false;
	}

	public static function buscaAmigos($nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT AMIGOA FROM amigos WHERE AMIGOB = '$nick'";
		$resultadoA = $conn->query($query);
		$resultadoA = $resultadoA->fetch_all();
		$query = "SELECT AMIGOB FROM amigos WHERE AMIGOA = '$nick'";
		$resultadoB = $conn->query($query);
		$resultadoB = $resultadoB->fetch_all();
		$tamA = count($resultadoA);
		$tamB = count($resultadoB);
		$resultado = array();
		for ($i = 0; $tamA > $i ; $i++){
			$resultado[] = $resultadoA[$i][0];
		}
		for ($i = 0; $i < $tamB ; $i++){
			$resultado[] = $resultadoB[$i][0];
		}
		return $resultado;
	}

	public static function enviaSolicitud($emisor, $receptor){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$emisor=mysqli_real_escape_string($conn,$emisor);
		$receptor=mysqli_real_escape_string($conn,$receptor);
		$query = "INSERT INTO `solicitudes`(`emisor`, `receptor`) VALUES ('$emisor','$receptor')";
		$conn->query($query);
	}

	public static function comprobarSolicitudes($nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$nick=mysqli_real_escape_string($conn,$nick);
		$query = "SELECT * FROM solicitudes WHERE RECEPTOR = '$nick'";
		$resultado = $conn->query($query);
		$resultado = $resultado->fetch_all();
		return $resultado;
	}

	public static function compruebaSolicitud($emisor, $receptor){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$emisor=mysqli_real_escape_string($conn,$emisor);
		$receptor=mysqli_real_escape_string($conn,$receptor);
		$query = "SELECT 1 FROM solicitudes WHERE RECEPTOR = '$receptor' AND EMISOR = '$emisor'";
		$resultado = $conn->query($query);
		$resultado = $resultado->fetch_all();
		if ($resultado)
			return true;
		else 
			return false;
	}

	public static function eliminarSolicitud($emisor,$receptor){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$emisor=mysqli_real_escape_string($conn,$emisor);
		$receptor=mysqli_real_escape_string($conn,$receptor);
		$query = "DELETE FROM `solicitudes` WHERE EMISOR = '$emisor' AND RECEPTOR = '$receptor'";
		$conn->query($query);
	}

	public static function cuentaSolicitudes($nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$nick=mysqli_real_escape_string($conn,$nick);
		$query = "SELECT count(*) FROM `solicitudes` WHERE receptor = '$nick'";
		$resultado = $conn->query($query);
		$resultado = $resultado->fetch_all();
		return $resultado[0][0];
	}
}

?>