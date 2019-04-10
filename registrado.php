<?php
	require("includes/config.php");
	$nick = htmlspecialchars(trim(strip_tags($_REQUEST["usernombre"])));
	$nombre = htmlspecialchars(trim(strip_tags($_REQUEST["nombre"])));
	$apellidos = htmlspecialchars(trim(strip_tags($_REQUEST["apellidos"])));
	$contraseña = htmlspecialchars(trim(strip_tags($_REQUEST["contraseña"])));
	$rcontraseña = htmlspecialchars(trim(strip_tags($_REQUEST["rcontraseña"])));
	$email = htmlspecialchars(trim(strip_tags($_REQUEST["email"])));
	$telefono = htmlspecialchars(trim(strip_tags($_REQUEST["telefono"])));
	
	$conn = $app->conexionBd();
	if(mysqli_connect_error()){
		echo "Error de conexión a la BD: ".mysql_connect_error();
		exit();
	}
	$querynick="SELECT * FROM usuario WHERE NICK='$nick'";
	$resultado=$conn->query($querynick)
			or die ($conn->error. " en la línea ".(__LINE__-1));
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
				if($nick!="" && $nombre!="" && $apellidos!="" && $contraseña!="" && $email!="" && $telefono!=""){
					if($resultado->num_rows==0){
						if($contraseña==$rcontraseña){
							$query="INSERT INTO usuario (NICK,NOMBRE,APELLIDOS,PASSWORD,MAIL,TELEFONO) 
									VALUES ('$nick','$nombre','$apellidos','$contraseña','$email','$telefono')";
							$conn->query($query)
								or die ($conn->error. " en la línea ".(__LINE__-1));
							echo '<p> ¡Enhorabuena '.$nick.', ya te has registrado!</p>';
							
						}
						else{
							echo '<p> Las contraseñas no coinciden</p>';
						}
					}
					else {
						echo '<p>Ese nick ya esta utilizado</p>';
					}
				}
				else{
					echo '<p> Has dejado vacío algunos campos del formulario </p>';
				}
				mysqli_close($conn);
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>