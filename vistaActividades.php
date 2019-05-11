<?php
	require("includes/config.php");
	require("includes/ActividadBD.php");
	
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
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Inicio </title>
	</head>
	<body>

		<?php
			$_SESSION['vista'] = "actividades";
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					mostrarActividades();			
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>