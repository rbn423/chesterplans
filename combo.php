<?php
	require("includes/config.php");

	$conn = $app->conexionBd();
	$id=$_GET["id"];
	$sql = "SELECT * FROM combo WHERE id = '$id'";
	$combo = $conn->query($sql);
	$combo= $combo->fetch_assoc();
	
	$idviaje = $combo["VIAJE"];
	$query = "SELECT * FROM viaje WHERE id = '$idviaje'";

	$viaje = $conn->query($query);
	$viaje = $viaje->fetch_assoc();

	$idActividades = array();
	$query = "SELECT idact FROM intercombo WHERE idcombo = '$id'";
	$idActividades = $conn->query($query);
	$idActividades = $idActividades->fetch_all();
	$tam = count($idActividades);
	$html = "";
	for ($i=0;$i<$tam;$i++){
		$query = "SELECT * FROM actividad WHERE id = '". $idActividades[$i][0]."'";
		$actividad = $conn->query($query);
		$actividad = $actividad->fetch_assoc();
		$html .= "<h3>".($i+1).". ".$actividad['TITULO']."</h3>";
		$html .= "<h4>".$actividad["DESCB"]."</h4>";
		$html .= "<p>".$actividad["DESCG"]."</p>";
		$html .= "<p>Creador: ".$actividad["CREADOR"]."</p>";
		$html .= "<p>Fecha: ".$actividad["FECHA"]."</p>";
	}


	function mostrarCombo($combo, $viaje, $html){
		echo "<h1>VIAJE</h1>";
		echo '<h2>'.$viaje["TITULO"].'</h2>';
		echo '<p>'.$viaje["DESCG"].'<p>';
		echo '<p> Fecha de inicio: '.$viaje["FECHAINI"].' Fecha de fin: '.$viaje["FECHAFIN"].'</p>';
		echo "<h1>ACTIVIDADES</h1>";
		echo $html;
		echo "<h2>Precio: ".$combo['PRECIO']." €</h2>";
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
					mostrarCombo($combo, $viaje, $html);		
				?>
				</div>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>