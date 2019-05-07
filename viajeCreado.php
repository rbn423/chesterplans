<?php
	require("includes/config.php");
	require("includes/ViajeBD.php");
	$nick = $_SESSION["nick"];
	$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["titulo"])));
	$descb = htmlspecialchars(trim(strip_tags($_REQUEST["descb"])));
	$texto = htmlspecialchars(trim(strip_tags($_REQUEST["descg"])));
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["precio"])));
	$fechaIni = htmlspecialchars(trim(strip_tags($_REQUEST["fechaIni"])));
	$fechaFin = htmlspecialchars(trim(strip_tags($_REQUEST["fechaFin"])));
	if($titulo != "" && $descb != "" && $texto != "" && $precio != "" && $precio > 0 && $fechaIni != "" && $fechaFin != ""){
		$conn = $app->conexionBd();
		$f=getdate()[0];
		$id=$nick.$f;
		ViajeBD::crearViaje($id, $titulo, $descb, $texto, $precio, $nick, $fechaIni, $fechaFin);
	}

	function mostrarCreado($nick,$titulo, $descb, $texto, $precio, $fechaIni, $fechaFin){
		if($titulo != "" && $descb != "" && $texto != "" && $precio != "" && $fechaIni != "" && $fechaFin != "" ){
			echo '<p> Enorabuena '.$nick.', ya has creado un viaje.</p>';
		}
		else{
			$mensaje = "No se ha creado el viaje porque faltan por rellenar: ";
			if($titulo == "")
				$mensaje .= " -titulo ";
			if($descb == "")
				$mensaje .= " -descripcion breve ";
			if($texto == "")
				$mensaje .= " -texto ";
			if($precio == "")
				$mensaje .= " -precio ";
			if($fechaIni == "")
				$mensaje .= " -fecha inicio ";
			if($fechaFin == "")
				$mensaje .= " -fecha fin ";
			echo $mensaje;
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
			require('includes/comun/cabecera.php');
			require('includes/comun/menu.php');
			require('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				mostrarCreado($nick,$titulo, $descb, $texto, $precio, $fechaIni, $fechaFin);
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>