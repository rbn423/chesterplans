<?php
	require("includes/config.php");

	function mostrarCrear(){
		echo '<form method="post" action="actividadCreada.php">';
			echo'<div id="escribirActividad">'; 
				echo'<h3>Título:</h3>';
				echo'<p><input type="text" name="titulo"/></p>';
				echo'<h3>Fecha:</h3>';
				echo'<p><input type="date" name="fecha"/></p>';
				echo'<h3>Descripcion breve: </h3>';
				echo'<p><textarea rows="5" cols="60" name="descb"></textarea></p>';
				echo'<h3>Texto:</h3>';
				echo'<p><textarea rows="10" cols="60" name="descg"></textarea></p>';
				echo'<h3>Precio:</h3>';
				echo'<p><textarea rows="1" cols="5" name="precio"></textarea></p>';
				echo'<p><input type="submit" value="Compartir"/></p>';
			echo'</div>';
		echo'</form>';
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Crear Actividad </title>
	</head>
	<body>

		<?php
			$_SESSION["vista"] = "crearActividad";
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					require('menuempresa.php');
					mostrarCrear();
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>