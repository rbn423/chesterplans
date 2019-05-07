<?php
require("config.php");

class ImagenBD {

	public static function insertaImagen($imagen,$idImagen,$idPublicacion){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$permitidos = array("image/jpg", "image/jpeg", "image/gif", "image/png");
   		$limite_kb = 16384;
		if (in_array($imagen['type'], $permitidos) && $imagen['size'] <= $limite_kb * 1024) {
			$nombreImagen=$imagen["name"];
			$datos=file_get_contents($imagen["tmp_name"]);
			$datos=mysqli_real_escape_string($conn,$datos);
			$query = "INSERT INTO foto (ID,NOMBRE,IMAGEN) VALUES ('$idImagen','$nombreImagen','$datos')";
			$conn->query($query);			
			$query = "INSERT INTO interfoto (IDPUBLICACION, IDFOTO) VALUES ('$idPublicacion','$idImagen')";
			$conn->query($query);
		}
		else{
			echo "Formato de imagen no permitido";
		}
	}
}

?>