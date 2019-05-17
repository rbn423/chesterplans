<?php
	require_once("includes/config.php");
	require_once("includes/BD/ActividadBD.php");
	
	function mostrarActividades(){
		$busquedas=ActividadBD::ListaActividades();
		$nactividades=count($busquedas);
		for ($i=0;$i<$nactividades;$i++){
			if($i!=$nactividades-1)
				echo '<div id="lista">';
			else
				echo '<div id="ultimolista">';
			$valor = $busquedas[$i][0];
			$actividad = ActividadBD::buscarActividad($valor);
			
			echo '<div id="info">';
			echo '<p id="titulo">'.$actividad["TITULO"].'</p>';
			echo '<p>'.$actividad["DESCB"].'<p>';
			echo '<p>Fecha: '.$actividad["FECHA"].'<p>';
			echo '<p>Precio: '.$actividad["PRECIO"].' €</p>';
			echo '</div>';
			echo '<div id="foto">';
			echo '</div>';
			echo '<form method="post" action="actividad.php?id='.$valor.'">';
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
			$_SESSION['vista'] = "actividades";
			require_once("includes/comun/cabecera.php");
			require_once("includes/comun/menu.php");
			require_once("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					mostrarActividades();			
				?>
			</div>
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
		
	
	</body>

</html>