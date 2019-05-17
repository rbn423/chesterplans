<?php
require_once("config.php");

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
	
	public static function buscarContenidoActividad($busqueda){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$sql = "SELECT * FROM actividad where titulo like '%$busqueda%' or descb like '%$busqueda%' or descg like '%$busqueda%'";
		$busquedas = $conn->query($sql); 
		$busquedas = $busquedas->fetch_all();
		return $busquedas;
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

	public static function buscarActividadCreador($idCreador) {
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT TITULO, ID, DESCB, DESCG, FECHA, PRECIO FROM actividad where CREADOR = '$idCreador'";
		$busquedas = $conn->query($query);
		$busquedas = $busquedas->fetch_all();
		return $busquedas;
	}

	public static function buscarFoto($idact) {
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT IDFOTO FROM interfoto where idpublicacion = '$idact'";
		$idFoto = $conn->query($query);
		$idFoto = $idFoto->fetch_all();
		if (count($idFoto) != 0){
			$idFoto = $idFoto[0][0];
			return $idFoto;
		}
		return $idFoto;
	}
	
	public static function crearActividad($id, $titulo, $descb, $texto, $precio, $nick, $fecha){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query="INSERT INTO actividad (ID,TITULO,DESCB,DESCG,CREADOR,PRECIO,FECHA) 
			VALUES ('$id','$titulo','$descb','$texto','$nick', '$precio','$fecha')";
		$conn->query($query);
	}

	public static function eliminarActividades($nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$nick = mysqli_real_escape_string($conn,$nick);
		$query = "DELETE FROM actividad WHERE CREADOR = '$nick'";
		$conn->query($query);
	}

}

?>