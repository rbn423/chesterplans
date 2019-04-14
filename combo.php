<?php
	require("includes/config.php");

	$conn = $app->conexionBd();
	$id=$_GET["id"];
	$sql = "SELECT * FROM combo where id = '$id'";
	$combo = $conn->query($sql);
	$combo= $combo->fetch_assoc();
	
	$idviaje = $combo["VIAJE"];
	$query = "SELECT * FROM combo where viaje = '$idviaje'";
	$viaje = $conn->query($query);
	$viaje = $viaje->fetch_assoc();

	$idactividad = $combo["ACTIVIDAD"];
	$query = "SELECT * FROM combo where actividad = '$idactividad'";
	$actividad = $conn->query($query);
	$actividad = $actividad->fetch_assoc();


	function mostrarCombo($combo, $viaje, $actividad){
		echo '<h1>'.$viaje["TITULO"].'</h1>';
		echo '<p>'.$viaje["DESCG"].'<p>';
		echo '<p> Fecha de inicio: '.$viaje["FECHAINI"].'    Fecha de fin: '.$viaje["FECHAFIN"].'</p>';
		echo '<h2>'.$actividad["TITULO"].'</p>';
		echo '<p>' .$actividad["DESCB"].'</p>';
		echo '<p>' .$combo["PRECIO"]. '</p>';
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
				<div id="Combo">
				<?php
					mostrarCombo($combo, $viaje, $actividad);		
				?>
				</div>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>