<?php
	session_start();
	$mysqli = new mysqli("localhost", "admin","admin", "chesterplans");
	if(mysqli_connect_error()){
		echo "Error de conexiÃ³n a la BD: ".mysql_connect_error();
		exit();
	}
	$id=$_GET["id"];
	$sql = "SELECT * FROM viaje where id = '$id'";
	$viaje = $mysqli->query($sql);
	$viaje = $viaje->fetch_assoc();
	
	$idcomen = $viaje["COMENTARIO"];
	$query = "SELECT * FROM comentario where id = '$idcomen'";
	$comentario = $mysqli->query($query);
	$comentario = $comentario->fetch_assoc();
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
				<div id="ViajeConcreto">
				<?php
					echo '<h1>'.$viaje["TITULO"].'</h1>';
					echo '<p>'.$viaje["DESCB"].'<p>';
					echo '<p>'.$viaje["DESCG"].'<p>';
					echo '<p>'.$viaje["FOTO"].'<p>';
					
					echo '<p>Comentarios: '.$comentario["COMENTARIO"].' escrito por: '.$comentario["ESCRITOR"].'<p>';
					
					echo '<p> Creador del viaje: '.$viaje["CREADOR"].'<p>';
					echo '<p> Fecha de inicio: '.$viaje["FECHAINI"].'    Fecha de fin: '.$viaje["FECHAFIN"].'</p>';
					echo '<p>Precio: '.$viaje["PRECIO"].'</p>';					
				?>
				</div>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>