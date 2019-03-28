<?php
	session_start();
	$mysqli = new mysqli("localhost", "admin","admin", "chesterplans");
	if(mysqli_connect_error()){
		echo "Error de conexión a la BD: ".mysql_connect_error();
		exit();
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<meta charset="utf-8">
		<title> viajes </title>
	</head>
	<body>

		<?php
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					$sql = "SELECT id FROM viaje";
					$busquedas = $mysqli->query($sql);
					$busquedas = $busquedas->fetch_all();
					$tam = sizeof($busquedas);
					for ($i=0;$i<6;$i++){
						if ($i < $tam){	
							$valor = $busquedas[$i][0];
							$sql = "SELECT * FROM viaje where id = '$valor'";
							$experiencia = $mysqli->query($sql);
							$experiencia = $experiencia->fetch_assoc();
							echo '<div id="cuadroExperiencia">';
								echo '<h1><a href="viaje.php?id='.$valor.'">'.$experiencia["TITULO"].'</a></h1>';
								echo '<p>'.$experiencia["DESCB"].'<p>';
								echo '<p>De '.$experiencia["FECHAINI"].' a '.$experiencia["FECHAFIN"]. '<p>';
								echo '<p>Precio: '.$experiencia["PRECIO"].'</p>';
							echo '</div>';
						}
					}
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>