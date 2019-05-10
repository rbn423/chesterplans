<?php
	require("includes/config.php");
	require("includes/ComboBD.php");

	$id=$_GET["id"];
	$combo = ComboBD::getCombo($id);
	$viaje = $combo["VIAJE"];
	$actividades = $combo["ACTIVIDADES"];

	function mostrarCombo($combo, $viaje, $actividades){
		echo "<h1>VIAJE</h1>";
		echo '<h2>'.$viaje["TITULO"].'</h2>';
		echo '<h3>'.$viaje["DESCB"].'</h3>';
		echo '<p>'.$viaje["DESCG"].'<p>';
		echo '<p> Fecha de inicio: '.$viaje["FECHAINI"].' Fecha de fin: '.$viaje["FECHAFIN"].'</p>';
		echo "<h1>ACTIVIDADES</h1>";
		$tam = count($actividades);
		for ($i=0;$i<$tam;$i++){
			echo "<h3>".($i+1).". ".$actividades[$i]['TITULO']."</h3>";
			echo "<h4>".$actividades[$i]["DESCB"]."</h4>";
			echo "<p>".$actividades[$i]["DESCG"]."</p>";
			echo "<p>Creador: ".$actividades[$i]["CREADOR"]."</p>";
			echo "<p>Fecha: ".$actividades[$i]["FECHA"]."</p>";
		}
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
				<div id="ComboConcreto">
				<?php
					mostrarCombo($combo, $viaje, $actividades);		
				?>
				</div>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>