<?php
	require_once("includes/config.php");
	require_once("includes/BD/ViajeBD.php");
	require_once("includes/BD/ImagenBD.php");
	$nick = $_SESSION["nick"];
	$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["titulo"])));
	$descb = htmlspecialchars(trim(strip_tags($_REQUEST["descb"])));
	$texto = htmlspecialchars(trim(strip_tags($_REQUEST["descg"])));
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["precio"])));
	$fechaIni = htmlspecialchars(trim(strip_tags($_REQUEST["fechaIni"])));
	$fechaFin = htmlspecialchars(trim(strip_tags($_REQUEST["fechaFin"])));
	$imagen = $_FILES["imagen"];
	
	$fechaIni = date("Ymd", strtotime($fechaIni));
	$fechaFin = date("Ymd", strtotime($fechaFin));
	if($titulo != "" && $descb != "" && $texto != "" && $precio != "" && $precio > 0 && $fechaIni <= $fechaFin){
		$conn = $app->conexionBd();
		$f=getdate()[0];
		$id=$nick.$f;
		if($imagen["size"] != 0 && $imagen["error"] == 0){
			$idImagen=$imagen["name"].$f;
			ImagenBD::insertaImagen($imagen,$idImagen,$id);
		}
		ViajeBD::crearViaje($id, $titulo, $descb, $texto, $precio, $nick, $fechaIni, $fechaFin);
	}

	function mostrarCreado($nick,$titulo, $descb, $texto, $precio, $fechaIni, $fechaFin){
		if($titulo != "" && $descb != "" && $texto != "" && $precio != "" && $fechaIni <= $fechaFin ){
			echo '<h1> Enorabuena '.$nick.', ya has creado un viaje.</h1>';
		}
		else{
			echo '<h1>No se ha creado la experiencia porque faltan por rellenar datos o son incorrectos</h1>';
		}
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Viaje creado </title>
	</head>
	<body>

		<?php
			require_once('includes/comun/cabecera.php');
			require_once('includes/comun/menu.php');
			require_once('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				mostrarCreado($nick,$titulo, $descb, $texto, $precio, $fechaIni, $fechaFin);
			?>		
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>