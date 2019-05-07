<?php
require("config.php");

class ActividadBD {
 
    private $Id;
    private $Titulo;
    private $Descb;
    private $Descg;
    private $Foto;
    private $Comentario;
    private $Creador;
    private $Fecha;
	private $Precio;
	

    public static function ListaActividades() {
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		if($_POST){
			if ($_POST['precio'] == 0)
				$sql = "SELECT id FROM actividad ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
			else
				$sql = "SELECT id FROM actividad WHERE precio < ".$_POST['precio']. " ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
		}
		else
			$sql = "SELECT id FROM actividad";
		$busquedas = $conn->query($sql);
		$busquedas = $busquedas->fetch_all();
		return $busquedas;
    }
	
		public static function buscarActividad($id){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$sql = "SELECT * FROM actividad where id = '$id'";
		$actividad = $conn->query($sql);
		$actividad = $actividad->fetch_assoc();
		return $actividad;
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
	
	public static function crearActividad($id, $titulo, $descb, $texto, $precio, $nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query="INSERT INTO actividad (ID,TITULO,DESCB,DESCG,CREADOR,PRECIO,FECHA) 
			VALUES ('$id','$titulo','$descb','$texto','$nick', '$precio','$fecha')";
		$conn->query($query);
	}
}

?>