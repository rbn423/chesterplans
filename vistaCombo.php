<?php
	require("includes/config.php");
	$conn = $app->conexionBd();

	function mostrarCombos($conn){
		$sql = "SELECT id FROM combo";
		$busquedas = $conn->query($sql);
		$ncombos=$busquedas->num_rows;
		$busquedas = $busquedas->fetch_all();
		for ($i=0;$i<$ncombos;$i++){	
			$valor = $busquedas[$i][0];
			$sql = "SELECT idact FROM intercombo WHERE idcombo = '".$id."'";
			$combo = $conn->query($sql);
			$combo = $combo->fetch_all());
			$nactividades=$combo->num_rows;
			for($i=0;$i<nactividades;$i++){
				$valor2 = $combo[$i][0];
				$sql= "SELECT titulo FROM actividad WHERE id = '".$id."'";
			}
			if($i!=$ncombos-1){
				echo '<div id="combo">';
			}
			else{
				echo '<div id="ultimocombo">';
				echo '<div id="info">';
				echo '<h1>'.$viaje["TITULO"].'</h1>';
				echo '<p>'.$viaje["DESCB"].'<p>';
				echo '<p>De '.$viaje["FECHAINI"].' a '.$viaje["FECHAFIN"]. '<p>';
				echo '<h2>'.$actividad["TITULO"].'</p>';
				echo '<p>' .$actividad["DESCB"].'</p>';
				echo '<p>Precio: '.$combo["PRECIO"].'</p>';
				echo '</div>';
				echo '<form method="post" action="viaje.php?id='.$valor.'">';
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
					mostrarCombos($conn);			
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>