<?php
	require("includes/config.php");
	$nick = $_SESSION["nick"];
	$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["titulo"])));
	$descb = htmlspecialchars(trim(strip_tags($_REQUEST["descb"])));
	$texto = htmlspecialchars(trim(strip_tags($_REQUEST["descg"])));
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["precio"])));
	$fechaIni = htmlspecialchars(trim(strip_tags($_REQUEST["fechaIni"])));
	$fechaFin = htmlspecialchars(trim(strip_tags($_REQUEST["FechaFin"])));
	if($titulo != "" && $descb != "" && $texto != "" && $precio != "" && $precio > 0 /* && comprobar fecha correcta*/){
		$conn = $app->conexionBd();
		$f=getdate()[0];
		$id=$nick.$f;
		$query="INSERT INTO experiencias (ID,TITULO,DESCB,DESCG,CREADOR,PRECIO,FECHAINI,FECHAFIN) 
			VALUES ('$id','$titulo','$descb','$texto','$nick', '$precio', '$fechaIni', '$fechaFin')";
		$conn->query($query)
			or die ($conn->error. " en la línea ".(__LINE__-1));
		mysqli_close($conn);
	}

	function mostrarCreado($titulo, $descb, $texto, $precio){
		if($titulo != "" && $descb != "" && $texto != "" && $precio != ""){
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
				mostrarCreado($titulo, $descb, $texto, $precio);
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>