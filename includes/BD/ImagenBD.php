<?php
require_once(dirname(__DIR__)."/config.php");

class ImagenBD {

	public static function insertaImagen($imagen,$idImagen,$idPublicacion){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
   		$limite_kb = 16384;
		if (in_array($imagen['type'], $permitidos) && $imagen['size'] <= $limite_kb * 1024) {
			$nombreImagen=$imagen["name"];
			$tipoImagen=$imagen["type"];
			$datos=file_get_contents($imagen["tmp_name"]);
			$datos=mysqli_real_escape_string($conn,$datos);
			$query = "INSERT INTO foto (ID,NOMBRE,IMAGEN,TIPO) VALUES ('$idImagen','$nombreImagen','$datos','$tipoImagen')";
			$conn->query($query);			
			$query = "INSERT INTO interfoto (IDPUBLICACION, IDFOTO) VALUES ('$idPublicacion','$idImagen')";
			$conn->query($query);
		}
		else{
			echo "Formato de imagen no permitido";
		}
	}

	public static function cargaImagen($idImagen){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT ID, NOMBRE, IMAGEN, TIPO FROM foto WHERE ID = '".$idImagen."'";
		$datos = $conn->query($query);
		$datos = $datos->fetch_assoc();
		$tipoImagen = $datos["TIPO"];
		$imagen = $datos["IMAGEN"];
		echo '<img src="data:'.$tipoImagen.';base64,'.base64_encode($imagen).'"/>';
	}
}

?>