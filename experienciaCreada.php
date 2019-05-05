<?php
	require("includes/config.php");
	require("includes/ExperienciaBD.php");

	$nick = $_SESSION["nick"];
	$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["titulo"])));
	$descb = htmlspecialchars(trim(strip_tags($_REQUEST["descb"])));
	$texto = htmlspecialchars(trim(strip_tags($_REQUEST["descg"])));
	if($titulo != "" && $descb != "" && $texto != ""){
		$f=getdate()[0];
		$id=$nick.$f;
		ExperienciaBD::crearExperiencia($id, $titulo, $descb, $texto, $nick);
	}

	function mostrarCreada($titulo, $descb, $texto, $nick){
		if($titulo != "" && $descb != "" && $texto != ""){
			echo '<p> Enhorabuena '.$nick.', ya has creado una experiencia.</p>';
		}
		else{
			$mensaje = "No se ha creado la experiencia porque faltan por rellenar: ";
			if($titulo == "")
				$mensaje .= " -titulo ";
			if($descb == "")
				$mensaje .= " -descripcion breve ";
			if($texto == "")
				$mensaje .= " -texto ";
			echo $mensaje;
		}
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Experiencia creada </title>
	</head>
	<body>

		<?php
			require('includes/comun/cabecera.php');
			require('includes/comun/menu.php');
			require('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				require('menubasico.php');
				mostrarCreada($titulo, $descb, $texto, $nick);
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>