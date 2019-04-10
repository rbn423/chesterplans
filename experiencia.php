<?php
	require("includes/config.php");
	$conn = $app->conexionBd();
	if(mysqli_connect_error()){
		echo "Error de conexiÃ³n a la BD: ".mysql_connect_error();
		exit();
	}
	$id=$_GET["id"];
	$sql = "SELECT * FROM experiencias where id = '$id'";
	$experiencia = $conn->query($sql);
	$experiencia = $experiencia->fetch_assoc();
	$idcomen = $experiencia["COMENTARIO"];
	$query = "SELECT * FROM comentario where id = '$idcomen'";//esta query habra que cambiarla orque habra que llamar a todos los comentarios
	$comentario = $conn->query($query);
	
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Inicio </title>
	</head>
	<body>

		<?php
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<div id="ExperienciaConcreta">
				<?php
					echo '<h1>'.$experiencia["TITULO"].'</h1>';
					echo '<p>'.$experiencia["DESCB"].'<p>';
					echo '<p>'.$experiencia["DESCG"].'<p>';
					echo '<p>'.$experiencia["FOTO"].'<p>';
					echo '<p> Autor de la experiencia '.$experiencia["CREADOR"].'<p>';
					if($comentario->num_rows>0){
						$comentario = $comentario->fetch_assoc();
						echo '<p>Comentarios: '.$comentario["COMENTARIO"].'. Comentario escrito por: '.$comentario["ESCRITOR"].'<p>';
					}
					if (isset($_SESSION["login"])){
						echo '<div id="nuevoComentario">';
						echo '<p>Crea tu comentario</p>';
						echo '</div>';
					}
				?>
				</div>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	</body>
</html>