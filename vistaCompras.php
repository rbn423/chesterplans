<?php
	require_once("includes/config.php");
	require_once("includes/BD/ComprasBD.php");
	require_once("includes/BD/ViajeBD.php");
	require_once("includes/BD/ActividadBD.php");
	require_once("includes/BD/ImagenBD.php");
	require_once("includes/BD/ComboBD.php");
	
	$nick = $_SESSION["nick"];

	function mostrarCompras($nick){
		$compras=ComprasBD::buscaCompras($nick);
		$nCompras=count($compras);
		if($nCompras==0){
			echo '<p>Aun no has comprado ningun viaje, actividad o combo.</p>';
		}
		else{
			$viajes = array();
			$nViajes = 0;
			$actividades = array();
			$nActividades = 0;
			$combos = array();
			$nCombos = 0;
			for($i=0; $i<$nCompras; $i++){
				if ($compras[$i][1] == "viaje"){
					$viajes[$nViajes] = ViajeBD::buscarViaje($compras[$i][2]);
					$nViajes++;
				}
				elseif($compras[$i][1] == "actividad"){
					$actividades[$nActividades] = ActividadBD::buscarActividad($compras[$i][2]);
					$nActividades++;
				}
				elseif($compras[$i][1] == "combo"){
					$combos[$nCombos] = comboBD::getCombo($compras[$i][2]);
					$nCombos++;
				}
			}

			if ($nViajes > 0){
				echo '<div id="nombre">';
				echo '<p>Viajes</p>';
				echo '</div>';
				for($i=0; $i<$nViajes; $i++){
					$idFoto = ViajeBD::buscarFoto($viajes[$i]['ID']);
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
					echo '<div id="foto">';
					if ($idFoto != NULL){
						imagenBD::cargaImagen($idFoto);
					}
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
					$idFoto = ActividadBD::buscarFoto($actividades[$i]['ID']);
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
					echo '<div id="foto">';
					if ($idFoto != NULL){
						imagenBD::cargaImagen($idFoto);
					}
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
					$idFotoViaje = ViajeBD::buscarFoto($viajeCombo["ID"]);
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
						$idFotoActividad[$j] = ActividadBD::buscarFoto($actividadesCombo[$j]["ID"]);
						echo "<li><p>".$actividadesCombo[$j]['TITULO'].": ".$actividadesCombo[$j]['DESCB']."</p></li>";
					}
					echo '<p>Precio: '.$combos[$i]["PRECIO"].' €</p>';
					echo '</div>';
					echo '<div id="foto">';
					if ($idFotoViaje != NULL){
						imagenBD::cargaImagen($idFotoViaje);
					}
					for ($j = 0; $j < $nActividadesCombo;$j++){
						if ($idFotoActividad[$j] != NULL){
							imagenBD::cargaImagen($idFotoActividad[$j]);
						}
					}
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
		<title> Mis compras </title>
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
				mostrarCompras($nick);
			?>		
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
