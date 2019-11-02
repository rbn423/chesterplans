<?php
require_once(dirname(__DIR__)."/config.php");

class DescuentoBD {

	public static function buscarDescuentos(){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT * FROM descuentos";
		$descuentos = $conn->query($query);
			$descuentos = $descuentos->fetch_all();
		$resultado = array();
		$nDescuentos = count($descuentos);
		for ($i = 0; $i < $nDescuentos; $i++){
			$resultado[$i]["id"] = $descuentos[$i][0];
			$resultado[$i]["nombre"] = $descuentos[$i][1];
			$resultado[$i]["porcentaje"] = $descuentos[$i][2];
			$resultado[$i]["tipo"] = $descuentos[$i][3];
			$resultado[$i]["puntos"] = $descuentos[$i][4];
		}
		return $resultado;
	}

		public static function buscarDescuentosUsuario($nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT descuentoid FROM interdescuentos WHERE nick = '$nick'";
		$busqueda = $conn->query($query);
		$busqueda = $busqueda->fetch_all();
		$nBusquedas = count($busqueda);
		$resultado = array();
		for ($i = 0; $i < $nBusquedas; $i++){
			$query = "SELECT * FROM descuentos WHERE id = '".$busqueda[$i][0]."'";
			$descuentos = $conn->query($query);
			$descuentos = $descuentos->fetch_all();
			$resultado[$i]["id"] = $descuentos[0][0];
			$resultado[$i]["nombre"] = $descuentos[0][1];
			$resultado[$i]["porcentaje"] = $descuentos[0][2];
			$resultado[$i]["tipo"] = $descuentos[0][3];
			$resultado[$i]["puntos"] = $descuentos[0][4];
		}
		return $resultado;
	}

	public static function insertaDescuento($nombre, $porcentaje, $tipo, $precio, $id){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$nombre=mysqli_real_escape_string($conn,$nombre);
		$porcentaje=mysqli_real_escape_string($conn,$porcentaje);
		$tipo=mysqli_real_escape_string($conn,$tipo);
		$precio=mysqli_real_escape_string($conn,$precio);
		$id=mysqli_real_escape_string($conn,$id);

		$query = "INSERT INTO `descuentos`(`nombre`, `porcentaje`, `tipo`, `id`, `puntos`) VALUES ('$nombre', '$porcentaje', '$tipo', '$id', '$precio')";
		$conn->query($query);
	}

	public static function eliminaDescuento($idDescuento){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$idDescuento=mysqli_real_escape_string($conn,$idDescuento);

		$query = "DELETE FROM descuentos WHERE id = '$idDescuento'";
		$conn->query($query);
	}

	public static function compruebaDescuento($idDescuento, $nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();

		$idDescuento=mysqli_real_escape_string($conn,$idDescuento);
		$nick=mysqli_real_escape_string($conn,$nick);

		$query = "SELECT 1 FROM interdescuentos WHERE nick = '$nick' AND descuentoid = '$idDescuento'";
		$resultado = $conn->query($query);
		$resultado = $resultado->fetch_all();
		$resultado = count($resultado);
		return $resultado;
	}

	public static function adquirirDescuento($id, $nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();

		$id=mysqli_real_escape_string($conn,$id);
		$nick=mysqli_real_escape_string($conn,$nick);

		$query = "INSERT INTO `interdescuentos`(`descuentoid`, `nick`) VALUES ('$id','$nick')";
		$conn->query($query);
	}
}

?>