<?php
	require_once("includes/config.php");
	require_once ('includes/BD/Usuario.php');

	$nombre = htmlspecialchars(trim(strip_tags($_REQUEST["nombre"])));
	$contraseña = htmlspecialchars(trim(strip_tags($_REQUEST["contra"])));
	
	$usuario = Usuario::login($nombre, $contraseña);

	if($usuario){
		$_SESSION["nombre"]=$usuario->nombre();
		$_SESSION["login"]=true;
		$_SESSION["nick"]=$usuario->nick();
		$_SESSION["apellidos"]=$usuario->apellidos();
		$_SESSION["mail"]=$usuario->mail();
		$_SESSION["telefono"]=$usuario->telefono();
		$_SESSION["tipo"]=$usuario->tipo();
		header('Location: index.php');
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Inicio </title>
	</head>
	<body>
		<?php
			require_once('includes/comun/cabecera.php');
			require_once('includes/comun/menu.php');
			require_once('includes/comun/izquierda.php');
		?>
			<div id="contenido">
				<?php
					echo '<p> El usuario o la contraseña no son correctos</p>';	
				?>
			</div>
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>	
	</body>
</html>