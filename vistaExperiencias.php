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
		<title> Inicio </title>
	</head>
	<body>

		<?php
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					$sql = "SELECT id FROM experiencias";
					$busquedas = $mysqli->query($sql);
					$nexp=$busquedas->num_rows;
					$busquedas = $busquedas->fetch_all();
					$tam = sizeof($busquedas);
					for ($i=0;$i<$nexp;$i++){
						if ($i < $tam){
							if($i!=$nexp-1)
								echo '<div id="experiencia">';
							else
								echo '<div id="ultimaexperiencia">';
							$valor = $busquedas[$i][0];
							$sql = "SELECT * FROM experiencias where id = '$valor'";
							$experiencia = $mysqli->query($sql);
							$experiencia = $experiencia->fetch_assoc();
							echo '<h3><a href="experiencia.php?id='.$valor.'">'.$experiencia["TITULO"].'</a></h3>';
							echo '<p>'.$experiencia["DESCB"].'<p>';
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