<?php
	require_once("includes/config.php");
	require_once("includes/BD/ExperienciaBD.php");
	require_once("includes/BD/imagenBD.php");
	
	$id = $_GET["id"];
	$experiencia= ExperienciaBD::buscarExperiencia($id);
	$comentario = ExperienciaBD::buscarlistaComentarios($id);
	$idFoto = ExperienciaBD::buscarFoto($id);

	if (isset($_POST['like'])){
		if($_POST['like'] == 'Me gusta')
			ExperienciaBD::meGusta($_SESSION['nick'],$id,$experiencia['CREADOR']);
		else
			ExperienciaBD::noMeGusta($_SESSION['nick'],$id,$experiencia['CREADOR']);
	}

	function mostrarExperiencia($experiencia,$comentario,$id,$idFoto){
		echo '<div id="ExperienciaConcreta">';
		echo '<h1>'.$experiencia["TITULO"].'</h1>';
		echo '<p>'.$experiencia["DESCB"].'<p>';
		echo '<p>'.$experiencia["DESCG"].'<p>';
		if ($idFoto != NULL){
			imagenBD::cargaImagen($idFoto);
		}
		echo '<p> Autor de la experiencia '.$experiencia["CREADOR"].'<p>';
		if (isset($_SESSION["login"])){
			$resultado=ExperienciaBD::tieneMegusta($_SESSION['nick'], $id);
			if ($resultado->num_rows == 1){
				echo '<div id="botonNoMeGusta">';
				echo '<form method="post" action="experienciaBasico.php?id='.$id.'">';
				echo '<div id="boton">';
				echo '<input type="submit" value="No me gusta" name="like">';
				echo '</div>';
				echo '</form>';
				echo '</div>';
			}
			else{
				echo '<div id="botonMeGusta">';
				echo '<form method="post" action="experienciaBasico.php?id='.$id.'">';
				echo '<div id="boton">';
				echo '<input type="submit" value="Me gusta" name="like">';
				echo '</div>';
				echo '</form>';
				echo '</div>';
			}
		}
		$ncomentarios=count($comentario);
		if($ncomentarios>0){
			for($i=0; $i<$ncomentarios; $i++){
				$valor=$comentario[$i][1];
				$comen = ExperienciaBD::buscarComentario($valor);
				if($i==0)
					echo '<div id="primercomentario">';
				else
					echo '<div id="comentario">';
				echo '<p>'.$comen["COMENTARIO"].'</p>';
				echo '<p>Por: '.$comen["ESCRITOR"].'<p>';
				echo '</div>';
			}
		}
		echo '</div>';
	}
	
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Inicio </title>
	</head>
	<body>

		<?php
			require_once("includes/comun/cabecera.php");
			require_once("includes/comun/menu.php");
			require_once("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					if ($_SESSION["tipo"] == "basico")
						require_once('menubasico.php');
					elseif ($_SESSION["tipo"] == "admin")
						require_once('menuAdmin.php');
					mostrarExperiencia($experiencia,$comentario,$id,$idFoto);
				?>
			</div>
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
		
	</body>
</html>