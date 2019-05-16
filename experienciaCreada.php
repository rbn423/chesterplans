<?php
	require_once("includes/config.php");
	require_once("includes/ExperienciaBD.php");
	require_once("includes/ImagenBD.php");

	$nick = $_SESSION["nick"];
	$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["titulo"])));
	$descb = htmlspecialchars(trim(strip_tags($_REQUEST["descb"])));
	$texto = htmlspecialchars(trim(strip_tags($_REQUEST["descg"])));
	$imagen = $_FILES["imagen"];
	
	if($titulo != "" && $descb != "" && $texto != ""){
		$f=getdate()[0];
		$id=$nick.$f;
		if($imagen["size"] != 0 && $imagen["error"] == 0){
			$idImagen=$imagen["name"].$f;
			ImagenBD::insertaImagen($imagen,$idImagen,$id);
		}
		else{
			//mostrar un mensaje de que la imagen ha fallado
		}
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
			require_once('includes/comun/cabecera.php');
			require_once('includes/comun/menu.php');
			require_once('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				require_once('menubasico.php');
				mostrarCreada($titulo, $descb, $texto, $nick);
			?>		
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>