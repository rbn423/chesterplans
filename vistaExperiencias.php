<?php
	require("includes/config.php");
	$conn = $app->conexionBd();
	
	function mostrarExperiencias($conn){
		$sql = "SELECT id FROM experiencias";
		$busquedas = $conn->query($sql);
		$nexperiencias=$busquedas->num_rows;
		$busquedas = $busquedas->fetch_all();
		for ($i=0;$i<$nexperiencias;$i++){
			if($i!=$nexperiencias-1)
				echo '<div id="experiencia">';
			else
				echo '<div id="ultimaexperiencia">';
			$valor = $busquedas[$i][0];
			$sql = "SELECT * FROM experiencias where id = '$valor'";
			$experiencia = $conn->query($sql);
			$experiencia = $experiencia->fetch_assoc();
			echo '<div id="info">';
			echo '<h2>'.$experiencia["TITULO"].'</h2>';
			echo '<p>'.$experiencia["DESCB"].'<p>';
			echo '</div>';
			echo '<form method="post" action="experiencia.php?id='.$valor.'">';						
			echo '<div id="boton">';
			echo '<input type="submit" value="Ver mas">';
			echo '</div>';
			echo '</form>';
			echo '</div>';
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
					mostrarExperiencias($conn);
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>