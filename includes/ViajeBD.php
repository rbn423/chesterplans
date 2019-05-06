<?php
require("config.php");

class ViajeBD {
 
    private $Id;
    private $Titulo;
    private $Descb;
    private $Descg;
    private $Foto;
    private $Comentario;
    private $Creador;
    private $FechaIni;
	private $FechaFin;
	private $Precio;
	

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

	public static function buscarListaViajesConcretas($nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query="SELECT id FROM viaje WHERE CREADOR='$nick'";
		$viajesCreados=$conn->query($query);
		$viajesCreados=$viajesCreados->fetch_all();
		return $viajesCreados;
	}
	
		public static function buscarViaje($id){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$sql = "SELECT * FROM viaje where id = '$id'";
		$experiencia = $conn->query($sql);
		$experiencia = $experiencia->fetch_assoc();
		return $experiencia;
	}
	
		public static function buscarListaComentarios($idact) {
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT * FROM intercomentario where id = '$idact'";
		$comentarios = $conn->query($query);
		$comentarios = $comentarios->fetch_all();
		return $comentarios;
	}
	
	public static function buscarComentario($idcomen){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$que= "SELECT * from comentario where id='$idcomen'";
		$comen=$conn->query($que);
		$comen= $comen->fetch_assoc();
		return $comen;
	}
	public static function buscarListaFotos($idact) {
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT * FROM interfoto where id = '$idact'";
		$comentarios = $conn->query($query);
		$comentarios = $comentarios->fetch_all();
		return $comentarios;
	}
	
	public static function buscarFoto($idfoto){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$que= "SELECT * from foto where id='$idfoto'";
		$comen=$conn->query($que);
		$comen= $comen->fetch_assoc();
		return $comen;
	}
   
}

?>