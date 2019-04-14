<?php
	require("includes/config.php");

	$conn = $app->conexionBd();
	$id=$_GET["id"];
	$sql = "SELECT * FROM actividad where id = '$id'";
	$actividad = $conn->query($sql);
	$actividad = $actividad->fetch_assoc();
	

	function mostrarActividad($actividad){
		echo '<h1>'.$actividad["TITULO"].'</h1>';
		echo '<p>'.$actividad["DESCB"].'<p>';
		echo '<p>'.$actividad["DESCG"].'<p>';
		echo '<p>'.$actividad["FOTO"].'<p>';
		echo '<p> Creador del viaje: '.$actividad["CREADOR"].'<p>';
		echo '<p> Fecha: '.$actividad["FECHA"].'</p>';
		echo '<p>Precio: '.$actividad["PRECIO"].' €</p>';
	}
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
				<div id="ActividadConcreta">
				<?php
					mostrarActividad($actividad);		
				?>
				</div>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>