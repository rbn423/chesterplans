<?php
	require("includes/config.php");
	require_once('includes/Usuario.php');

	$nick = htmlspecialchars(trim(strip_tags($_REQUEST["usernombre"])));
	$nombre = htmlspecialchars(trim(strip_tags($_REQUEST["nombre"])));
	$apellidos = htmlspecialchars(trim(strip_tags($_REQUEST["apellidos"])));
	$contraseña = htmlspecialchars(trim(strip_tags($_REQUEST["contraseña"])));
	$rcontraseña = htmlspecialchars(trim(strip_tags($_REQUEST["rcontraseña"])));
	$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
	$telefono = htmlspecialchars(trim(strip_tags($_REQUEST["telefono"])));
	$tipo = "nada";

	$user = Usuario::crea($nick, $nombre, $apellidos, $contraseña, $rcontraseña, $email, $telefono, $tipo );
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Registrado </title>
	</head>
	<body>

		<?php
			require('includes/comun/cabecera.php');
			require('includes/comun/menu.php');
			require('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				if ($user){
					echo '<p> ¡Enhorabuena '.$nick.', ya te has registrado!</p>';
				}	
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
	
	</body>

</html>