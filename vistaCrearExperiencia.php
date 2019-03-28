<?php
	session_start();
	$mysqli = new mysqli("localhost", "admin","admin", "chesterplans");
	if(mysqli_connect_error()){
		echo "Error de conexión a la BD: ".mysql_connect_error();
		exit();
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<meta charset="utf-8">
		<title> Crear Experiencia </title>
	</head>
	<body>

		<?php
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					if(isset($_SESSION["login"])){ 
						echo '<form method="post" action="experienciaCreada.php">';
							echo'<div id="escribirExperiencia">';
								echo'<h3>Título:</h3>';
								echo'<p><input type="text" name="titulo"/></p>';
								echo'<h3>Descripción breve:</h3>';
								echo'<p><input type="text" name="descb" size="50"/></p>';
								echo'<h3>Texto:</h3>';
								echo'<p><textarea rows="10" cols="60" name="descg"></textarea></p>';
								echo'<p><input type="submit" value="compartir"/></p>';
							echo'</div>';
						echo'</form>';
					}
					else{
						echo '<h1>Usuario sin registrar</h1>' ;
						echo '<p>registrarte para poder compartir contenido creado por ti.</p>';			
					}
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>