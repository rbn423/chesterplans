<?php
	require("includes/config.php");
	require("includes/ActividadBD.php");

	$nick = $_SESSION["nick"];
	$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["titulo"])));
	$fecha = htmlspecialchars(trim(strip_tags($_REQUEST["fecha"])));
	$descb = htmlspecialchars(trim(strip_tags($_REQUEST["descb"])));
	$texto = htmlspecialchars(trim(strip_tags($_REQUEST["descg"])));
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["precio"])));
	if($titulo != "" && $descb != "" && $texto != "" && $precio > 0){
		$f=getdate()[0];
		$id=$nick.$f;
		ActividadBD::crearActividad($id, $titulo, $descb, $texto, $precio, $nick);
	}

	function mostrarCreado($nick, $titulo, $descb, $texto, $precio){
		if($titulo != "" && $descb != "" && $texto != "" && $precio != ""){
			echo '<p> Enorabuena '.$nick.', ya has creado una actividad.</p>';
		}
		else{
			$mensaje = "No se ha creado la experiencia porque faltan por rellenar: ";
			if($titulo == "")
				$mensaje .= " -titulo ";
			if($descb == "")
				$mensaje .= " -descripcion breve ";
			if($texto == "")
				$mensaje .= " -texto ";
			if($precio == "")
				$mensaje .= " -precio ";
			echo $mensaje;
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
			require('includes/comun/cabecera.php');
			require('includes/comun/menu.php');
			require('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				mostrarCreado($nick,$titulo, $descb, $texto, $precio);
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>