<?php
	require("includes/config.php");
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
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