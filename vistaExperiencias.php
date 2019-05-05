<?php
	require("includes/config.php");
	require("includes/ExperienciaBD.php");
	
	function mostrarExperiencias(){
		$busquedas=ExperienciaBD::buscarListaExperiencias();
		$nexperiencias=count($busquedas);
		for ($i=0;$i<$nexperiencias;$i++){
			if($i!=$nexperiencias-1)
				echo '<div id="lista">';
			else
				echo '<div id="ultimolista">';
			$valor = $busquedas[$i][0];
			$experiencia = ExperienciaBD::buscarExperiencia($valor);
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
			$_SESSION['vista'] = "experiencias";
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					mostrarExperiencias();
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>