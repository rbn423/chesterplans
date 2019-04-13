<?php
	require("includes/config.php");

	$conn = $app->conexionBd();
	$id=$_GET["id"];
	$sql = "SELECT * FROM combo c, intercombo i, actividad a where c.combo = '$id' and 
	i.idcombo = '$id' and i.idact = a.id";
	$combo = $conn->query($sql);
	$combo = $combo->fetch_assoc();
	
	
	$idact= $combo["ACTIVIDAD"];
	$query = "SELECT * FROM ACTIVIDAD where id = '$idact'";
	$idact = $conn->query($sql);
	$idact = $combo->fetch_assoc();

	function mostrarCombo($combo, $actividad){
		echo '<p> Creador del combo: '.$combo["CREADOR"].
		echo '<h1>'.$actividad["TITULO"].'</h1>';
		echo '<p>'.$actividad["DESCB"].'<p>';
		echo '<p>'.$actividad["DESCG"].'<p>';
		echo '<p>Precio: '.$viaje["PRECIO"].'</p>';
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
				<div id="ViajeConcreto">
				<?php
					mostrarViaje($combo, $actividad);		
				?>
				</div>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>