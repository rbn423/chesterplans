<?php
	require_once("includes/config.php");

	function mostrarCrear(){
		echo '<div id="escribirViaje">';
		echo '<form method="post" action="descuentoCreado.php">';
			echo'<div id="escribirDescuento">'; 
				echo'<h3>Nombre del descuento:</h3>';
				echo'<p><input type="text" name="nombre"/></p>';
				echo'<h3>Porcentaje de descuento:</h3>';
				echo'<p><input type="text" name="porcentaje"/>%</p>';
				echo'<h3>Tipo de producto afectado: </h3>';
				echo '<select name="tipo">';
				echo '<option value="todos">Todos</option>';
				echo '<option value="viaje">Viajes</option>';
				echo '<option value="actividad">Actividades</option>';
				echo '<option value="combo">Combos</option>';
				echo '</select>';
				echo'<h3>Puntos necesarios: </h3>';
				echo'<p><input type="text" name="precio"></text> puntos</p>';
				echo'<p><input type="submit" value="Crear"/></p>';
			echo'</div>';
		echo'</form>';
		echo '</div>';
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Crear Descuento </title>
	</head>
	<body>

		<?php
			$_SESSION["vista"] = "crearDescuento";
			require_once("includes/comun/cabecera.php");
			require_once("includes/comun/menu.php");
			require_once("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					require_once('menuadmin.php');
					mostrarCrear();
				?>
			</div>
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
		
	
	</body>

</html>