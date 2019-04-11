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
					$sql = "SELECT id FROM viaje";
					$busquedas = $conn->query($sql);
					$nviajes=$busquedas->num_rows;
					$busquedas = $busquedas->fetch_all();
					for ($i=0;$i<$nviajes;$i++){	
						$valor = $busquedas[$i][0];
						$sql = "SELECT * FROM viaje where id = '$valor'";
						$experiencia = $conn->query($sql);
						$experiencia = $experiencia->fetch_assoc();
						if($i!=$nviajes-1)
							echo '<div id="viaje">';
						else
							echo '<div id="ultimoviaje">';
								echo '<div id="info">';
								echo '<h1>'.$experiencia["TITULO"].'</h1>';
								echo '<p>'.$experiencia["DESCB"].'<p>';
								echo '<p>De '.$experiencia["FECHAINI"].' a '.$experiencia["FECHAFIN"]. '<p>';
								echo '<p>Precio: '.$experiencia["PRECIO"].'</p>';
								echo '</div>';
								echo '<form method="post" action="viaje.php?id='.$valor.'">';
								echo '<div id="boton">';
									echo '<input type="submit" value="Ver mas">';
								echo '</div>';
								echo '</form>';
							echo '</div>';
					}
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>