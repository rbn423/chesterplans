<?php
require("config.php");

class ViajeBD {

    public static function ListaViajes() {
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		if($_POST){
			if ($_POST['precio'] == 0)
				$sql = "SELECT id FROM viaje ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
			else
				$sql = "SELECT id FROM viaje WHERE precio < ".$_POST['precio']. " ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
		}
		else
			$sql = "SELECT id FROM viaje";
		$busquedas = $conn->query($sql);
		$busquedas = $busquedas->fetch_all();
		return $busquedas;
    }

    public static function buscarNombreViaje($id){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$sql = "SELECT TITULO FROM viaje where id = '$id'";
		$busquedas = $conn->query($sql);
		$busquedas = $busquedas->fetch_assoc();
		return $busquedas["TITULO"];
	}
	
	public static function buscarViaje($id){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$sql = "SELECT * FROM viaje where id = '$id'";
		$busquedas = $conn->query($sql);
		$busquedas = $busquedas->fetch_assoc();
		return $busquedas;
	}
	
	public static function buscarContenidoViaje($busqueda){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$sql = "SELECT * FROM viaje where titulo like '%$busqueda' or titulo like '$busqueda%' or titulo like '%$busqueda%' or 
		descb like '%$busqueda' or descg like '$busqueda%' or descb like '%$busqueda%' or
				descg like '%$busqueda' or descg like '$busqueda%' or descg like '%$busqueda%'";
		$busquedas = $conn->query($sql); 
		$busquedas = $busquedas->fetch_all();
		return $busquedas;
	}
	
	public static function buscarListaComentarios($idact) {
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT * FROM intercomentario where id = '$idact'";
		$busquedas = $conn->query($query);
		$busquedas = $busquedas->fetch_all();
		return $busquedas;
	}
	
	public static function buscarComentario($idcomen){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$que= "SELECT * from comentario where id='$idcomen'";
		$busquedas=$conn->query($que);
		$busquedas= $busquedas->fetch_assoc();
		return $busquedas;
	}

	public static function buscarViajeCreador($idCreador) {
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT titulo, id, descb, descg, fechaini, fechafin, precio FROM viaje where creador = '$idCreador'";
		$busquedas = $conn->query($query);
		$busquedas = $busquedas->fetch_all();
		return $busquedas;
	}

	public static function buscarListaFotos($idact) {
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT * FROM interfoto where id = '$idact'";
		$busquedas = $conn->query($query);
		$busquedas = $busquedas->fetch_all();
		return $busquedas;
	}
	
	public static function buscarFoto($idfoto){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$que= "SELECT * from foto where id='$idfoto'";
		$busquedas = $conn->query($que);
		$busquedas = $busquedas->fetch_assoc();
		return $busquedas;
	}

	public static function crearViaje($id, $titulo, $descb, $texto, $precio, $nick, $fechaIni, $fechaFin){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query="INSERT INTO viaje (ID,TITULO,DESCB,DESCG,CREADOR,PRECIO,FECHAINI,FECHAFIN) 
			VALUES ('$id','$titulo','$descb','$texto','$nick', '$precio', '$fechaIni', '$fechaFin')";
		$conn->query($query);
	}
}

?>