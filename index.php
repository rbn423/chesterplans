<?php
	require_once("includes/config.php");
	require_once("includes/BD/ExperienciaBD.php");
	require_once("includes/BD/ViajeBD.php");
	require_once("includes/BD/ActividadBD.php");
	
	$conn = $app->conexionBd();
	
	function mostrarContenido($conn){
		
		$viajes=viajeBD::ListaViajes();
		$nviajes=count($viajes);
		echo '<div id="nombre">';
		echo '<p>Viajes</p>';
		echo '</div>';
		for($i=0; $i<$nviajes; $i++){
			if($i<2){
				$valor = $viajes[$i][0];
				$viaje=ViajeBD::buscarViaje($valor);
				if($i!=$nviajes-1){
				echo '<div id="lista">';
				}
				else{
					echo '<div id="ultimolista">';
				}
				echo '<div id="info">';
				echo '<p id="titulo">'.$viaje["TITULO"].'</p>';
				echo '<p>'.$viaje["DESCB"].'<p>';
				echo '<p>De '.$viaje["FECHAINI"].' a '.$viaje["FECHAFIN"]. '<p>';
				echo '<p>Precio: '.$viaje["PRECIO"].' €</p>';
				echo '</div>';
				echo '<form method="post" action="viaje.php?id='.$valor.'">';
				echo '<div id="boton">';
				echo '<input type="submit" value="Ver más">';
				echo '</div>';
				echo '</form>';
				echo '</div>';
			}
		}

		$actividades= ActividadBD::ListaActividades();
		$nact=count($actividades);
		echo '<div id="nombre">';
		echo '<p>Actividades</p>';
		echo '</div>';
		for($i=0; $i<$nact; $i++){
			if($i<2){
				$valor = $actividades[$i][0];
				$actividad=ActividadBD::buscarActividad($valor);
				if($i!=$nact-1){
				echo '<div id="lista">';
				}
				else{
					echo '<div id="ultimolista">';
				}
				echo '<div id="info">';
				echo '<p id="titulo">'.$actividad["TITULO"].'</p>';
				echo '<p>'.$actividad["DESCB"].'<p>';
				echo '<p>Precio: '.$actividad["PRECIO"].' €</p>';
				echo '</div>';
				echo '<form method="post" action="actividad.php?id='.$valor.'">';
				echo '<div id="boton">';
				echo '<input type="submit" value="Ver más">';
				echo '</div>';
				echo '</form>';
				echo '</div>';
			}
		}
		$experiencias= ExperienciaBD::buscarListaExperiencias();
		$nexperiencias=count($experiencias);
		echo '<div id="nombre">';
		echo '<p>Experiencias</p>';
		echo '</div>';
		for($i=0; $i<$nexperiencias; $i++){
			if($i<2){
				$valor = $experiencias[$i][0];
				$experiencia=ExperienciaBD::buscarExperiencia($valor);
				if($i!=$nexperiencias-1)
					echo '<div id="lista">';
				else
					echo '<div id="ultimolista">';
				echo '<div id="info">';
				echo '<p id="titulo">'.$experiencia["TITULO"].'</p>';
				echo '<p>'.$experiencia["DESCB"].'<p>';
				echo '</div>';
				echo '<form method="post" action="experiencia.php?id='.$valor.'">';						
				echo '<div id="boton">';
				echo '<input type="submit" value="Ver más">';
				echo '</div>';
				echo '</form>';
				echo '</div>';
			}
		}
		
		//añadir algun combo de vista lejana
	}
		
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Inicio </title>
	</head>
	<body>

		<?php
			$_SESSION['vista'] = "index";
			require_once("includes/comun/cabecera.php");
			require_once("includes/comun/menu.php");
			require_once("includes/comun/izquierda.php");
		?>
			<div id="contenido">
			 	<?php
					mostrarContenido($conn);
				?>
			</div>
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
	</body>

</html>