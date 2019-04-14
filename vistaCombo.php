<?php
	require("includes/config.php");
	$conn = $app->conexionBd();

	function mostrarCombo($conn){
		$sql = "SELECT id FROM combo";
		$busquedas = $conn->query($sql);
		$ncombo=$busquedas->num_rows;
		$busquedas = $busquedas->fetch_all();
		for ($i=0;$i<$ncombo;$i++){	
			$valor = $busquedas[$i][0];
			$sql = "SELECT * FROM combo where id = '$valor'";
			$combo = $conn->query($sql);
			$combo = $combo->fetch_assoc();
			if($i!=$ncombo-1){
				echo '<div id="combo">';
			}
			else{
				echo '<div id="ultimocombo">';
				echo '<div id="info">';
				echo '<h1>'.$combo["VIAJE"].'</h1>';
				echo '<p>'.$combo["ACTIVIDAD"].'<p>';
				echo '<p>Precio: '.$combo["PRECIO"].'</p>';
				echo '</div>';
				echo '<form method="post" action="combo.php?id='.$valor.'">';
				echo '<div id="boton">';
				echo '<input type="submit" value="Ver mas">';
				echo '</div>';
				echo '</form>';
				echo '</div>';
			}
		}
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
				<?php
					mostrarCombo($conn);			
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>