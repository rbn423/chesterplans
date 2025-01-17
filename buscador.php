<?php
	require_once("includes/config.php");
	require_once("includes/BD/ViajeBD.php");
	require_once("includes/BD/ExperienciaBD.php");
	require_once("includes/BD/ActividadBD.php");
	require_once("includes/BD/ComboBD.php");
	
	$filtro = htmlspecialchars(trim(strip_tags($_REQUEST["tema"])));
	$texto = htmlspecialchars(trim(strip_tags($_REQUEST["buscar"])));

	function mostrarResultado($filtro, $texto){
		if($filtro == "viajes"){
			$viajes = ViajeBD::buscarContenidoViaje($texto);
			$nviajes = count($viajes);

			if($nviajes == 0){
				echo '<div id="nombre">';
				echo '<p>No existen resultados con la búsqueda</p>';
				echo '</div>';
			}
			else{
				echo '<div id="nombre">';
				echo '<p>Viajes</p>';
				echo '</div>';
				for ($i=0;$i<$nviajes;$i++){
					if($i!=$nviajes-1)
						echo '<div id="lista">';
					else
						echo '<div id="ultimolista">';
					
					$valor = $viajes[$i][0];
					$viaje = ViajeBD::buscarViaje($valor);
					echo '<div id="info">';
					echo '<h1>'.$viaje["TITULO"].'</h1>';
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
		}
		else if($filtro == "actividades"){
			$actividades = ActividadBD::buscarContenidoActividad($texto);
			$nact = count($actividades);
			if($nact == 0){
				echo '<div id="nombre">';
				echo '<p>No existen resultados con la búsqueda</p>';
				echo '</div>';
			}
			else{
				echo '<div id="nombre">';
				echo '<p>Actividades</p>';
				echo '</div>';
				for ($i=0;$i<$nact;$i++){
					if($i!=$nact-1)
						echo '<div id="lista">';
					else
						echo '<div id="ultimolista">';
					$valor = $actividades[$i][0];
					$actividad = ActividadBD::buscarActividad($valor);
					echo '<div id="info">';
					echo '<h1>'.$actividad["TITULO"].'</h1>';
					echo '<p>'.$actividad["DESCB"].'<p>';
					echo '<p>Fecha: '.$actividad["FECHA"].'<p>';
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
		}
		else if($filtro == "experiencias"){
			$experiencias = ExperienciaBD::buscarContenidoExperiencia($texto);
			$nexp = count($experiencias);
			if($nexp == 0){
				echo '<div id="nombre">';
				echo '<p>No existen resultados con la búsqueda</p>';
				echo '</div>';
			}
			else{
				echo '<div id="nombre">';
				echo '<p>Experiencias</p>';
				echo '</div>';				
				for ($i=0;$i<$nexp;$i++){
					if($i!=$nexp-1)
						echo '<div id="lista">';
					else
						echo '<div id="ultimolista">';
					$valor = $experiencias[$i][0];
					$experiencia = ExperienciaBD::buscarExperiencia($valor);
					echo '<div id="info">';
					echo '<h2>'.$experiencia["TITULO"].'</h2>';
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
		}
		else if($filtro == "todo"){
			$viajes = ViajeBD::buscarContenidoViaje($texto);
			$nviajes = count($viajes);
			$actividades = ActividadBD::buscarContenidoActividad($texto);
			$nact = count($actividades);	
			$experiencias = ExperienciaBD::buscarContenidoExperiencia($texto);
			$nexp = count($experiencias);
			
			if($nviajes == 0 && $nact == 0 && $nexp == 0){
				echo '<div id="nombre">';
				echo '<p>No existen resultados con la búsqueda</p>';
				echo '</div>';
			}
			else{
				if($nviajes > 0){
					echo '<div id="nombre">';
					echo '<p>Viajes</p>';
					echo '</div>';
					for ($i=0;$i<$nviajes;$i++){
						if($i!=$nviajes-1)
							echo '<div id="lista">';
						else
							echo '<div id="ultimolista">';
						
						$valor = $viajes[$i][0];
						$viaje = ViajeBD::buscarViaje($valor);
						echo '<div id="info">';
						echo '<h1>'.$viaje["TITULO"].'</h1>';
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
				if($nact > 0){
					echo '<div id="nombre">';
					echo '<p>Actividades</p>';
					echo '</div>';
					for ($i=0;$i<$nact;$i++){
						if($i!=$nact-1)
							echo '<div id="lista">';
						else
							echo '<div id="ultimolista">';
						$valor = $actividades[$i][0];
						$actividad = ActividadBD::buscarActividad($valor);
						echo '<div id="info">';
						echo '<h1>'.$actividad["TITULO"].'</h1>';
						echo '<p>'.$actividad["DESCB"].'<p>';
						echo '<p>Fecha: '.$actividad["FECHA"].'<p>';
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
				if($nexp > 0){
					echo '<div id="nombre">';
					echo '<p>Experiencias</p>';
					echo '</div>';			
					for ($i=0;$i<$nexp;$i++){
						if($i!=$nexp-1)
							echo '<div id="lista">';
						else
							echo '<div id="ultimolista">';
						$valor = $experiencias[$i][0];
						$experiencia = ExperienciaBD::buscarExperiencia($valor);
						echo '<div id="info">';
						echo '<h2>'.$experiencia["TITULO"].'</h2>';
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
			}
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
			require_once("includes/comun/cabecera.php");
			require_once("includes/comun/menu.php");
			require_once("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					mostrarResultado($filtro, $texto);			
				?>
			</div>
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
		
	
	</body>

</html>