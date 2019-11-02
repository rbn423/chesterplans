<?php
	require_once("includes/config.php");
	require_once("includes/BD/ComboBD.php");
	require_once("includes/BD/ImagenBD.php");
	require_once("includes/BD/ViajeBD.php");
	require_once("includes/BD/ActividadBD.php");

	function mostrarCombos(){
		$combos = ComboBD::getListaCombos();
		$ncombos = count($combos);
		for ($i=0;$i<$ncombos;$i++){	
			$idcombo = $combos[$i]["ID"];
			$idViaje = $combos[$i]["idViaje"];
			$viaje = $combos[$i]["VIAJE"];
			$precio = $combos[$i]["PRECIO"];
			$actividades = $combos[$i]["ACTIVIDADES"];
			$nactividades = count($actividades);
			$idFotoViaje = ViajeBD::buscarFoto($idViaje);
			if($i!=$ncombos-1){
				echo '<div id="lista">';
			}
			else
				echo '<div id="ultimolista">';
			echo '<div id="info">';
			echo '<p id="titulo">'.$combos[$i]["VIAJE"]["titulo"].': '.$combos[$i]["VIAJE"]["descb"].'</p>';
			echo "<ul>";
			for($j=0;$j<$nactividades;$j++){
				$idFotoActividad[$j] = ActividadBD::buscarFoto($actividades[$j]["id"]);
				echo "<li><p>".$actividades[$j]['titulo'].": ".$actividades[$j]['descb']."</p></li>";
			}
			echo '<p>Precio: '.$precio.' €</p>';
			echo '</div>';
			echo '<div id="combo">';
			if ($idFotoViaje != NULL){
				imagenBD::cargaImagen($idFotoViaje);
			}
			for ($j = 0; $j < $nactividades;$j++){
				if ($idFotoActividad[$j] != NULL){
					imagenBD::cargaImagen($idFotoActividad[$j]);
				}
			}
			echo '</div>';
			echo '<form method="post" action="combo.php?id='.$idcombo.'">';
			echo '<div id="boton">';
			echo '<input type="submit" value="Ver mas">';
			echo '</div>';
			echo '</form>';
			echo '</div>';
		}
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Inicio </title>
	</head>
	<body>

		<?php
			$_SESSION['vista'] = "combos";
			require_once("includes/comun/cabecera.php");
			require_once("includes/comun/menu.php");
			require_once("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					mostrarCombos();			
				?>
			</div>
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
		
	
	</body>

</html>