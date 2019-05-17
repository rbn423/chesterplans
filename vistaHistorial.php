<?php
	require_once("includes/config.php");
	require_once("includes/BD/ViajeBD.php");
	require_once("includes/BD/ComboBD.php");
	require_once("includes/BD/ActividadBD.php");
	
	if ($_SESSION["tipo"] == "admin")
		$nick = $_POST["nick"];
	else
		$nick = $_SESSION["nick"];

	function mostrarHistorial($nick){
		$combosCreados = ComboBD::getCombosCreador($nick);
		$nCombosCreados = count($combosCreados);
		$actividadesCreadas = ActividadBD::buscarActividadCreador($nick);
		$nActividadesCreadas = count($actividadesCreadas);
		$viajesCreados = viajeBD::buscarViajeCreador($nick);
		$nViajesCreados = count($viajesCreados);
		if ($nCombosCreados == 0 && $nActividadesCreadas == 0 && $nViajesCreados == 0)
			echo '<p>Aún no has añadido ninguna oferta.</p>';
		else{
			if ($nViajesCreados > 0){
				echo '<div id="nombre">';
				echo '<p>Viajes</p>';
				echo '</div>';
				for($i=0; $i<$nViajesCreados; $i++){
					if($i!=$nViajesCreados-1){
					echo '<div id="lista">';
					}
					else{
						echo '<div id="ultimolista">';
					}
					echo '<div id="info">';
					echo '<p id="titulo">'.$viajesCreados[$i][0].'</p>';
					echo '<p>'.$viajesCreados[$i][2].'<p>';
					echo '<p>De '.$viajesCreados[$i][4].' a '.$viajesCreados[$i][5]. '<p>';
					echo '<p>Precio: '.$viajesCreados[$i][6].' €</p>';
					echo '</div>';
					echo '<form method="post" action="viaje.php?id='.$viajesCreados[$i][1].'">';
					echo '<div id="boton">';
					echo '<input type="submit" value="Ver mas">';
					echo '</div>';
					echo '</form>';
					echo '</div>';
				}
			}

			if ($nActividadesCreadas > 0){
				echo '<div id="nombre">';
				echo '<p>Actividades</p>';
				echo '</div>';
				for($i=0; $i<$nActividadesCreadas; $i++){
					if($i!=$nActividadesCreadas-1){
					echo '<div id="lista">';
					}
					else{
						echo '<div id="ultimolista">';
					}
					echo '<div id="info">';
					echo '<p id="titulo">'.$actividadesCreadas[$i][0].'</p>';
					echo '<p>'.$actividadesCreadas[$i][2].'<p>';
					echo '<p>Precio: '.$actividadesCreadas[$i][5].' €</p>';
					echo '</div>';
					echo '<form method="post" action="actividad.php?id='.$actividadesCreadas[$i][1].'">';
					echo '<div id="boton">';
					echo '<input type="submit" value="Ver mas">';
					echo '</div>';
					echo '</form>';
					echo '</div>';
				}
			}

			if($nCombosCreados > 0){
				echo '<div id="nombre">';
				echo '<p>Combos</p>';
				echo '</div>';
				for($i=0; $i<$nCombosCreados; $i++){
					$viajeCombo = $combosCreados[$i]["VIAJE"];
					$actividadesCombo = $combosCreados[$i]["ACTIVIDADES"];
					$nActividadesCombo = count($actividadesCombo);
					if($i!=$nCombosCreados-1){
						echo '<div id="lista">';
					}
					else{
						echo '<div id="ultimolista">';
					}
					echo '<div id="info">';
					echo '<p id="titulo">'.$viajeCombo["titulo"].': '.$viajeCombo["descb"].'</p>';
					echo "<ul>";
					for($j=0;$j<$nActividadesCombo;$j++){
						echo "<li><p>".$actividadesCombo[$j]["titulo"].": ".$actividadesCombo[$j]["descb"]."</p></li>";
					}
					echo '<p>Precio: '.$combosCreados[$i]["PRECIO"].' €</p>';
					echo '</div>';
					echo '<form method="post" action="combo.php?id='.$combosCreados[$i]['ID'].'">';
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
		<title> Ofertas creadas </title>
	</head>
	<body>

		<?php
			require_once('includes/comun/cabecera.php');
			require_once('includes/comun/menu.php');
			require_once('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				if ($_SESSION["tipo"] == "empresa")
					require_once('menuempresa.php');
				elseif($_SESSION["tipo"] == "admin")
					require_once("menuadmin.php");
				mostrarHistorial($nick);
			?>		
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
