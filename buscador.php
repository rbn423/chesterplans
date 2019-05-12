<?php
	require("includes/config.php");
	require("includes/ViajeBD.php");
	require("includes/ExperienciaBD.php");
	require("includes/ActividadBD.php");
	
	$filtro = htmlspecialchars(trim(strip_tags($_REQUEST["tema"])));
	$texto = htmlspecialchars(trim(strip_tags($_REQUEST["buscar"])));

	function mostrarResultado($filtro, $texto){
		if($filtro == "viajes"){
			$viajes = ViajeBD::buscarContenidoViaje($texto);
			$nviajes = count($viajes);
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
		else if($filtro == "actividades"){
			$actividades = ActividadBD::buscarContenidoActividad($texto);
			$nact = count($actividades);
			
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
		else if($filtro == "experiencias"){
			$experiencias = ExperienciaBD::buscarContenidoExperiencia($texto);
			$nexp = count($experiencias);
			
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
		else if($filtro == "todo"){
			$viajes = ViajeBD::buscarContenidoViaje($texto);
			$nviajes = count($viajes);
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
			$actividades = ActividadBD::buscarContenidoActividad($texto);
			$nact = count($actividades);		
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
			$experiencias = ExperienciaBD::buscarContenidoExperiencia($texto);
			$nexp = count($experiencias);
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
				<?php
					mostrarResultado($filtro, $texto);			
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>