<?php
	require_once("includes/config.php");
	require_once("includes/InteresesBD.php");
	require_once("includes/ViajeBD.php");
	require_once("includes/ActividadBD.php");
	require_once("includes/ComboBD.php");
	
	$nick = $_SESSION["nick"];

	function mostrarIntereses($nick){
		$intereses=InteresesBD::buscaIntereses($nick);
		$nIntereses=count($intereses);
		if($nIntereses==0){
			echo '<p>Aún no has añadido ningun viaje, actividad o combo a tus intereses.</p>';
		}
		else{
			$viajes = array();
			$nViajes = 0;
			$actividades = array();
			$nActividades = 0;
			$combos = array();
			$nCombos = 0;
			for($i=0; $i<$nIntereses; $i++){
				if ($intereses[$i][2] == "viaje"){
					$viajes[$nViajes] = ViajeBD::buscarViaje($intereses[$i][1]);
					$nViajes++;
				}
				elseif($intereses[$i][2] == "actividad"){
					$actividades[$nActividades] = ActividadBD::buscarActividad($intereses[$i][1]);
					$nActividades++;
				}
				elseif($intereses[$i][2] == "combo"){
					$combos[$nCombos] = comboBD::getCombo($intereses[$i][1]);
					$nCombos++;
				}
			}

			if ($nViajes > 0){
				echo '<div id="nombre">';
				echo '<p>Viajes</p>';
				echo '</div>';
				for($i=0; $i<$nViajes; $i++){
					if($i!=$nViajes-1){
					echo '<div id="lista">';
					}
					else{
						echo '<div id="ultimolista">';
					}
					echo '<div id="info">';
					echo '<p id="titulo">'.$viajes[$i]["TITULO"].'</p>';
					echo '<p>'.$viajes[$i]["DESCB"].'<p>';
					echo '<p>De '.$viajes[$i]["FECHAINI"].' a '.$viajes[$i]["FECHAFIN"]. '<p>';
					echo '<p>Precio: '.$viajes[$i]["PRECIO"].' €</p>';
					echo '</div>';
					echo '<form method="post" action="viaje.php?id='.$viajes[$i]['ID'].'">';
					echo '<div id="boton">';
					echo '<input type="submit" value="Ver mas">';
					echo '</div>';
					echo '</form>';
					echo '</div>';
				}
			}

			if ($nActividades > 0){
				echo '<div id="nombre">';
				echo '<p>Actividades</p>';
				echo '</div>';
				for($i=0; $i<$nActividades; $i++){
					if($i!=$nActividades-1){
					echo '<div id="lista">';
					}
					else{
						echo '<div id="ultimolista">';
					}
					echo '<div id="info">';
					echo '<p id="titulo">'.$actividades[$i]["TITULO"].'</p>';
					echo '<p>'.$actividades[$i]["DESCB"].'<p>';
					echo '<p>Precio: '.$actividades[$i]["PRECIO"].' €</p>';
					echo '</div>';
					echo '<form method="post" action="actividad.php?id='.$actividades[$i]['ID'].'">';
					echo '<div id="boton">';
					echo '<input type="submit" value="Ver mas">';
					echo '</div>';
					echo '</form>';
					echo '</div>';
				}
			}

			if($nCombos > 0){
				echo '<div id="nombre">';
				echo '<p>Combos</p>';
				echo '</div>';
				for($i=0; $i<$nCombos; $i++){
					$viajeCombo = $combos[$i]["VIAJE"];
					$actividadesCombo = $combos[$i]["ACTIVIDADES"];
					$nActividadesCombo = count($actividadesCombo);
					if($i!=$nCombos-1){
						echo '<div id="lista">';
					}
					else{
						echo '<div id="ultimolista">';
					}
					echo '<div id="info">';
					echo '<p id="titulo">'.$viajeCombo['TITULO'].': '.$viajeCombo["DESCB"].'</p>';
					echo "<ul>";
					for($j=0;$j<$nActividadesCombo;$j++){
						echo "<li><p>".$actividadesCombo[$j]['TITULO'].": ".$actividadesCombo[$j]['DESCB']."</p></li>";
					}
					echo '<p>Precio: '.$combos[$i]["PRECIO"].' €</p>';
					echo '</div>';
					echo '<form method="post" action="combo.php?id='.$combos[$i]['ID'].'">';
					echo '<div id="boton">';
					echo '<input type="submit" value="Ver mas">';
					echo '</div>';
					echo '</form>';
					echo '</div>';
				}
			}
		}
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Mis intereses </title>
	</head>
	<body>

		<?php
			require_once('includes/comun/cabecera.php');
			require_once('includes/comun/menu.php');
			require_once('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				require_once('menubasico.php');
				mostrarIntereses($nick);
			?>		
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
