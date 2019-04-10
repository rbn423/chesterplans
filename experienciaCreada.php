<?php
	session_start();
	$nick = $_SESSION["nick"];
	$titulo = htmlspecialchars(trim(strip_tags($_REQUEST["titulo"])));
	$descb = htmlspecialchars(trim(strip_tags($_REQUEST["descb"])));
	$texto = htmlspecialchars(trim(strip_tags($_REQUEST["descg"])));
	if($titulo != "" && $descb != "" && $texto != ""){
		$mysqli = new mysqli("localhost", "admin","admin", "chesterplans");
		if(mysqli_connect_error()){
			echo "Error de conexión a la BD: ".mysql_connect_error();
			exit();
		}
		$f=getdate()[0];
		$id=$nick.$f;
		$query="INSERT INTO experiencias (ID,TITULO,DESCB,DESCG,CREADOR) 
			VALUES ('$id','$titulo','$descb','$texto','$nick')";
		$mysqli->query($query)
			or die ($mysqli->error. " en la línea ".(__LINE__-1));
		mysqli_close($mysqli);
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<meta charset="utf-8">
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
			if($titulo != "" && $descb != "" && $texto != ""){
				echo '<p> Enorabuena '.$nick.', ya has creado una experiencia.</p>';
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
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>