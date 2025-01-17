<?php
	require_once("includes/config.php");
	
	function mostrarCrear(){
		if(isset($_SESSION["login"])){ 
			echo '<form method="post" action="experienciaCreada.php" enctype="multipart/form-data">';
			echo'<div id="escribirExperiencia">';
			echo'<h3>Título:</h3>';
			echo'<p><input type="text" name="titulo"/></p>';
			echo'<h3>Descripción breve:</h3>';
			echo'<p><input type="text" name="descb" size="50"/></p>';
			echo'<h3>Texto:</h3>';
			echo'<p><textarea rows="10" cols="60" name="descg"></textarea></p>';
			echo'<p>Imagenes:</p>';
			echo'<p><input type="file" name="imagen" id="imagen"/></p>';
			echo'<p><input type="submit" value="compartir"/></p>';
			echo'</div>';
			echo'</form>';
		}
		else{
			echo '<h1>Usuario sin registrar</h1>' ;
			echo '<p>registrarte para poder compartir contenido creado por ti.</p>';			
		}
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Crear Experiencia </title>
	</head>
	<body>

		<?php
			$_SESSION["vista"] = "crearExperiencia";
			require_once("includes/comun/cabecera.php");
			require_once("includes/comun/menu.php");
			require_once("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					require_once("menubasico.php");
					mostrarCrear();
				?>
			</div>
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
		
	
	</body>

</html>