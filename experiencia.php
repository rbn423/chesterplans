<?php
	session_start();
	$mysqli = new mysqli("localhost", "admin","admin", "chesterplans");
	if(mysqli_connect_error()){
		echo "Error de conexiÃ³n a la BD: ".mysql_connect_error();
		exit();
	}
	$id=$_GET["id"];
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<meta charset="utf-8">
		<title> Inicio </title>
	</head>
	<body>

		<?php
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					$sql = "SELECT * FROM experiencias where id = '$id'";
					$experiencia = $mysqli->query($sql);
					$experiencia = $experiencia->fetch_assoc();
					//echo '<div id="ExperienciaConcreta">';
					echo '<h1>'.$experiencia["TITULO"].'</h1>';
					echo '<p>'.$experiencia["DESCB"].'<p>';
					echo '<p>'.$experiencia["DESCG"].'<p>';
					echo '<p>'.$experiencia["FOTO"].'<p>';
					
					$idcomen = $experiencia["COMENTARIO"];
					$query = "SELECT * FROM comentario where id = '$idcomen'";
					$comentario = $mysqli->query($query);
					$comentario = $comentario->fetch_assoc();
					echo '<p>Comentarios: '.$comentario["COMENTARIO"].'. Comentario escrito por: '.$comentario["ESCRITOR"].'<p>';
					echo '<p> Autor de la experiencia '.$experiencia["CREADOR"].'<p>';		
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>