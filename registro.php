<?php
	require("includes/config.php");
	echo "hola";
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Inicio </title>
	</head>
	<body>

		<?php
			require('includes/comun/cabecera.php');
			require('includes/comun/menu.php');
			require('includes/comun/izquierda.php');
		?>
			<div id="contenido">
				<form method="post" action="registrado.php">
				<div id="registro">
				<h1>Registro de Usuario</h1>
				<p>
					Nick de usuario:
					<input type="text" name="usernombre"/>
				</p>
				<p>
					Nombre: 
					<input type="text" name="nombre"/>
				</p>
				<p>
					Apellidos: 
					<input type="text" name="apellidos"/>
				</p>
				<p>
					Contraseña: 
					<input type="password" name="contraseña"/>
				</p>
				<p>
					Introduzca la contraseña de nuevo: 
					<input type="password" name="rcontraseña"/>
				</p>
				<p>
					Email: 
					<input type="text" name="email"/>
				</p>
				<p>
					Teléfono: 
					<input type="text" name="telefono"/>
				</p>
				<p>
					<input type="submit" value="Enviar">
				</p>
				</form>
				</div>
			</div>
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>