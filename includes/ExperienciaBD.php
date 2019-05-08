<?php
require("config.php");

class ExperienciaBD {
	
	public static function buscarListaExperiencias(){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		if($_POST)
			$sql = "SELECT id FROM experiencias ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
		else
			$sql = "SELECT id FROM experiencias";
		$busquedas = $conn->query($sql);
		$busquedas = $busquedas->fetch_all();
		return $busquedas;
	}
	
	public static function buscarListaExperienciasConcretas($nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query="SELECT id FROM experiencias WHERE CREADOR='$nick'";
		$experienciasCreadas=$conn->query($query);
		$experienciasCreadas=$experienciasCreadas->fetch_all();
		return $experienciasCreadas;
	}
	
	public static function buscarExperiencia($id){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$sql = "SELECT * FROM experiencias where id = '$id'";
		$experiencia = $conn->query($sql);
		$experiencia = $experiencia->fetch_assoc();
		return $experiencia;
	}
	
	public static function buscarListaComentarios($idexp) {
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT * FROM intercomentario where id = '$idexp'";
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
	
	public static function tieneMegusta($nick, $id){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query="SELECT * FROM megustas WHERE nickusuario = '$nick' AND idexperiencia = '$id'";
		$resultado = $conn->query($query);
		return $resultado;
	}
	
	public static function meGusta($nick,$id,$creador){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "INSERT INTO megustas(NICKUSUARIO, IDEXPERIENCIA) VALUES ('$nick','$id')";
		$conn->query($query);
		$query = "UPDATE usuario SET PUNTOS = puntos+'1' WHERE nick = '$creador'";
		$conn->query($query);
		$query = "UPDATE experiencias SET likes = likes+'1' WHERE id = '$id'";
		$conn->query($query);
	}
	
	public static function noMeGusta($nick,$id,$creador){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "DELETE FROM megustas WHERE NICKUSUARIO = '$nick' AND IDEXPERIENCIA = '$id'";
		$conn->query($query);
		$query = "UPDATE usuario SET PUNTOS = puntos-'1' WHERE nick = '$creador'";
		$conn->query($query);
		$query = "UPDATE experiencias SET likes = likes-'1' WHERE id = '$id'";
		$conn->query($query);
	}
	
	public static function nuevoComentario($id,$nick,$comentario){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		//añadir comentario
		$f=getdate()[0];
		$idcomentario=$nick.$f;
		$query = "INSERT INTO `comentario`(`ID`, `ESCRITOR`, `COMENTARIO`) VALUES ('$idcomentario','$nick','$comentario')";
		$conn->query($query);
		//añadir a intercomentario
		$query = "INSERT INTO `intercomentario`(`ID`, `IDCOMENT`, `TIPO`) VALUES ('$id','$idcomentario','experiencia')";
		$conn->query($query);
	}
	
	public static function crearExperiencia($id, $titulo, $descb, $texto, $nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query="INSERT INTO experiencias (ID,TITULO,DESCB,DESCG,CREADOR) 
			VALUES ('$id','$titulo','$descb','$texto','$nick')";
		$conn->query($query);
	}
}

?>