<?php
	require_once("includes/config.php");
	require_once("includes/BD/ActividadBD.php");
	require_once("includes/BD/ImagenBD.php");

	$nick = $_SESSION["nick"];
	$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["titulo"])));
	$fecha = htmlspecialchars(trim(strip_tags($_REQUEST["fecha"])));
	$descb = htmlspecialchars(trim(strip_tags($_REQUEST["descb"])));
	$texto = htmlspecialchars(trim(strip_tags($_REQUEST["descg"])));
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["precio"])));
	$imagen = $_FILES["imagen"];
	
	$fechaactual = date("Ymd");
	$fecha = date("Ymd", strtotime($fecha));
	if($titulo != "" && $descb != "" && $texto != "" && $precio > 0 && $fecha >= $fechaactual){
		$f=getdate()[0];
		$id=$nick.$f;
		if($imagen["size"] != 0 && $imagen["error"] == 0){
			$idImagen=$imagen["name"].$f;
			ImagenBD::insertaImagen($imagen,$idImagen,$id);
		}
		ActividadBD::crearActividad($id, $titulo, $descb, $texto, $precio, $nick, $fecha);
	}

	function mostrarCreado($nick, $titulo, $descb, $texto, $precio, $fecha, $fechaactual){
		if($titulo != "" && $descb != "" && $texto != "" && $precio > 0 && $fecha >= $fechaactual){
			echo '<h1> Enhorabuena '.$nick.', ya has creado una actividad.</h1>';
		}
		else{
			echo '<h1>No se ha creado la experiencia porque faltan por rellenar datos o son incorrectos</h1>';
		}
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Actividad creada </title>
	</head>
	<body>

		<?php
			require_once('includes/comun/cabecera.php');
			require_once('includes/comun/menu.php');
			require_once('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				mostrarCreado($nick,$titulo, $descb, $texto, $precio, $fecha, $fechaactual);
			?>		
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>