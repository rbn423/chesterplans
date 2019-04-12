<?php
	require("includes/config.php");

	$nick = $_SESSION["nick"];
	$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["titulo"])));
	$fechaIni = htmlspecialchars(trim(strip_tags($_REQUEST["fechaIni"])));
	$descb = htmlspecialchars(trim(strip_tags($_REQUEST["descb"])));
	$texto = htmlspecialchars(trim(strip_tags($_REQUEST["descg"])));
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["precio"])));
	if($titulo != "" && $descb != "" && $texto != "" && $precio > 0 /*&& Fecha*/){
		$conn = $app->conexionBd();
		if(mysqli_connect_error()){
			echo "Error de conexión a la BD: ".mysql_connect_error();
			exit();
		}
		$f=getdate()[0];
		$id=$nick.$f;
		$query="INSERT INTO actividad (ID,TITULO,DESCB,DESCG,CREADOR,PRECIO) 
			VALUES ('$id','$titulo','$descb','$texto','$nick', '$precio')";
		$conn->query($query)
			or die ($conn->error. " en la línea ".(__LINE__-1));
		mysqli_close($conn);
	}

	function mostrarCreado($titulo, $descb, $texto, $precio){
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
				mostrarCreado($titulo, $descb, $texto, $precio);
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>