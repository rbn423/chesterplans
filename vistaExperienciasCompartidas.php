<?php
	require_once("includes/config.php");
	require_once("includes/BD/ExperienciaBD.php");
	require_once("includes/BD/ImagenBD.php");
	
	$nick = $_SESSION["nick"];

	function mostrarExpCompartidas($nick){
		$experienciasCreadas=ExperienciaBD::buscarListaExperienciasConcretas($nick);
		$nexperiencias=count($experienciasCreadas);
		if($nexperiencias==0){
			echo '<p>Aun no has creado ninguna experiencia</p>';
			echo '<p>Si quieres crear una experiencia <a href="vistaCrearExperiencia.php">pulsa aqui</a></p>';
		}
		else{
			for($i=0; $i<$nexperiencias; $i++){
				if($i!=$nexperiencias-1)
					echo '<div id="lista">';
				else
					echo '<div id="ultimolista">';
				$valor = $experienciasCreadas[$i][0];
				$experiencia = ExperienciaBD::buscarExperiencia($valor);
				$idFoto = ExperienciaBD::buscarFoto($valor);
				echo '<div id="info">';
				echo '<h2>'.$experiencia["TITULO"].'</h2>';
				echo '<p>'.$experiencia["DESCB"].'<p>';
				echo '</div>';
				echo '<div id="foto">';
				if ($idFoto != NULL){
					imagenBD::cargaImagen($idFoto);
				}
				echo '</div>';
				echo '<form method="post" action="experienciaBasico.php?id='.$valor.'">';						
				echo '<div id="boton">';
				echo "<p>".$experiencia["likes"]." Puntos</p>";
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
		<title> Experiencia creada </title>
	</head>
	<body>

		<?php
			require_once('includes/comun/cabecera.php');
			require_once('includes/comun/menu.php');
			require_once('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				require_once('menubasico.php');
				mostrarExpCompartidas($nick);
			?>		
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
