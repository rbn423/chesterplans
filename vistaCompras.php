<?php
	require("includes/config.php");
	require("includes/ComprasBD.php");
	require("includes/ViajeBD.php");
	require("includes/ActividadBD.php");
	require("includes/ComboBD.php");
	
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
					if($i!=$nViajes-1){
					echo '<div id="lista">';
					}
					else{
						echo '<div id="ultimolista">';
					}
					echo '<div id="info">';
					echo '<h1>'.$viajes[$i]["TITULO"].'</h1>';
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
					echo '<h1>'.$actividades[$i]["TITULO"].'</h1>';
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
					echo '<h1>'.$viajeCombo['TITULO'].': '.$viajeCombo["DESCB"].'</h1>';
					echo "<ul>";
					for($j=0;$j<$nActividadesCombo;$j++){
						echo "<li><h2>".$actividadesCombo[$j]['TITULO'].": ".$actividadesCombo[$j]['DESCB']."</h2></li>";
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
		<title> Mis compras </title>
	</head>
	<body>

		<?php
			require('includes/comun/cabecera.php');
			require('includes/comun/menu.php');
			require('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				require('menubasico.php');
				mostrarCompras($nick);
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
