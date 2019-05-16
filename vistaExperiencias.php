<?php
	require_once("includes/config.php");
	require_once("includes/ExperienciaBD.php");
	require_once("includes/ImagenBD.php");
	
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
			$idFoto = ExperienciaBD::buscarFoto($valor);
			echo '<div id="info">';
			echo '<p id="titulo">'.$experiencia["TITULO"].'</p>';
			echo '<p>'.$experiencia["DESCB"].'<p>';
			echo '</div>';
			if ($idFoto != NULL){
				imagenBD::cargaImagen($idFoto);
			}
			echo '<form method="post" action="experiencia.php?id='.$valor.'">';						
			echo '<div id="boton">';
			echo '<input type="submit" value="Ver más">';
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
			require_once("includes/comun/cabecera.php");
			require_once("includes/comun/menu.php");
			require_once("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					mostrarExperiencias();
				?>
			</div>
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
		
	
	</body>

</html>