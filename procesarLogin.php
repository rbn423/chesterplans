<?php
	require("includes/config.php");
	
	$nombre = htmlspecialchars(trim(strip_tags($_REQUEST["nombre"])));
	$contraseña = htmlspecialchars(trim(strip_tags($_REQUEST["contra"])));
	$conn = $app->conexionBd();
	
	$query="SELECT * FROM usuario WHERE NICK='$nombre' AND PASSWORD='$contraseña'";
	
	$resultado = $conn->query($query)
		or die ($conn->error. " en la línea ".(__LINE__-1));

	if($resultado->num_rows==1 && $nombre!="" && $contraseña!=""){
		$SESSION["nombre"]=$nombre;
		$SESSION["contraseña"]=$contraseña;
		$_SESSION["login"]=true;
		$_SESSION["nick"]=$nombre;
		header('Location: index.php');
	}
	mysqli_close($conn);
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