<?php
	require_once("includes/config.php");
	require_once("includes/BD/ViajeBD.php");
	require_once("includes/BD/ImagenBD.php");

	function mostrarViajes(){
		
		$busquedas=viajeBD::ListaViajes();
		$nviajes=count($busquedas);
	
		for ($i=0;$i<$nviajes;$i++){
			if($i!=$nviajes-1)
				echo '<div id="lista">';
			else
				echo '<div id="ultimolista">';
			$valor = $busquedas[$i][0];
			$viaje = ViajeBD::buscarViaje($valor);
			$idFoto = ViajeBD::buscarFoto($valor);
			echo '<div id="info">';
			echo '<p id="titulo">'.$viaje["TITULO"].'</p>';
			echo '<p>'.$viaje["DESCB"].'<p>';
			echo '<p>De '.$viaje["FECHAINI"].' a '.$viaje["FECHAFIN"]. '<p>';
			echo '<p>Precio: '.$viaje["PRECIO"].' €</p>';
			echo '</div>';
			echo '<div id="foto">';
			if ($idFoto != NULL){
				imagenBD::cargaImagen($idFoto);
			}
			echo '</div>';
			echo '<form method="post" action="viaje.php?id='.$valor.'">';
			echo '<div id="boton">';
			echo '<input type="submit" value="Ver más">';
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
			$_SESSION['vista'] = "viajes";
			require_once("includes/comun/cabecera.php");
			require_once("includes/comun/menu.php");
			require_once("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					mostrarViajes();			
				?>
			</div>
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
		
	
	</body>

</html>