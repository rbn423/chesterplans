<?php
	session_start();
	
	$nombre = htmlspecialchars(trim(strip_tags($_REQUEST["nombre"])));
	$contraseña = htmlspecialchars(trim(strip_tags($_REQUEST["contra"])));
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<meta charset="utf-8">
		<title> Inicio </title>
	</head>
	<body>
		<?php
			$mysqli = new mysqli("localhost", "admin","admin", "chesterplans");
			if(mysqli_connect_error()){
				echo "Error de conexión a la BD: ".mysql_connect_error();
				exit();
			}
			
			$query="SELECT * FROM usuario WHERE NICK='$nombre' AND PASSWORD='$contraseña'";
			
			$resultado = $mysqli->query($query)
				or die ($mysqli->error. " en la línea ".(__LINE__-1));

			if($resultado->num_rows==1 && $nombre!="" && $contraseña!=""){
				$SESSION["nombre"]=$nombre;
				$SESSION["contraseña"]=$contraseña;
				$_SESSION["login"]=true;
				$_SESSION["nick"]=$nombre;
				header('Location: index.php');
			}
			mysqli_close($mysqli);
			require('includes/comun/cabecera.php');
			require('includes/comun/menu.php');
			require('includes/comun/izquierda.php');
		?>
			<div id="contenido">
				<?php
						echo '<p> El usuario o la contraseña no son correctos</p>';	
				?>
			</div>
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>	
	</body>
</html>