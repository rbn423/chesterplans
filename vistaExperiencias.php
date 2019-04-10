<?php
	require("includes/config.php");
	$conn = $app->conexionBd();
	if(mysqli_connect_error()){
		echo "Error de conexión a la BD: ".mysql_connect_error();
		exit();
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Inicio </title>
	</head>
	<body>

		<?php
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<div id="experiencias">
				<?php
					$sql = "SELECT id FROM experiencias";
					$busquedas = $conn->query($sql);
					$busquedas = $busquedas->fetch_all();
					$tam = sizeof($busquedas);
					for ($i=0;$i<6;$i++){
						if ($i < $tam){
							echo '<div id="experiencia">';
							$valor = $busquedas[$i][0];
							$sql = "SELECT * FROM experiencias where id = '$valor'";
							$experiencia = $conn->query($sql);
							$experiencia = $experiencia->fetch_assoc();
							echo '<div id="cuadroExperiencia">';
								echo '<h3><a href="experiencia.php?id='.$valor.'">'.$experiencia["TITULO"].'</a></h3>';
								echo '<p>'.$experiencia["DESCB"].'<p>';
							echo '</div>';
							echo '</div>';
						}
						
					}
				?>
				</div>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>