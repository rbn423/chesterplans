<?php
	require("includes/config.php");
	require("includes/ExperienciaBD.php");
	require("includes/imagenBD.php");
	
	$id = $_GET["id"];
	$experiencia= ExperienciaBD::buscarExperiencia($id);
	$comentarios = ExperienciaBD::buscarlistaComentarios($id);
	$idFoto = ExperienciaBD::buscarFoto($id);

	if (isset($_POST['like'])){
		if($_POST['like'] == 'Me gusta')
			ExperienciaBD::meGusta($_SESSION['nick'],$id,$experiencia['CREADOR']);
		else
			ExperienciaBD::noMeGusta($_SESSION['nick'],$id,$experiencia['CREADOR']);
	}

	function mostrarExperiencia($experiencia,$comentarios,$id,$idFoto){
		echo '<div id="infoExperiencia">';
		echo '<h1>'.$experiencia["TITULO"].'</h1>';
		echo '<p>'.$experiencia["DESCB"].'<p>';
		echo '<p>'.$experiencia["DESCG"].'<p>';
		if ($idFoto != NULL){
			imagenBD::cargaImagen($idFoto);
		}
		echo '<p> Autor de la experiencia '.$experiencia["CREADOR"].'<p>';
		echo '</div>';
		if (isset($_SESSION["login"])){
			$resultado=ExperienciaBD::tieneMegusta($_SESSION['nick'], $id);
			if ($resultado->num_rows == 1){
				echo '<div id="botonNoMeGusta">';
				echo '<form method="post" action="experiencia.php?id='.$id.'">';
				echo '<div id="boton">';
				echo '<input type="submit" value="No me gusta" name="like">';
				echo '</div>';
				echo '</form>';
				echo '</div>';
			}
			else{
				echo '<div id="botonMeGusta">';
				echo '<form method="post" action="experiencia.php?id='.$id.'">';
				echo '<div id="boton">';
				echo '<input type="submit" value="Me gusta" name="like">';
				echo '</div>';
				echo '</form>';
				echo '</div>';
			}
		}
		$ncomentarios=count($comentarios);
		if($ncomentarios>0){
			for($i=0; $i<$ncomentarios; $i++){
				$valor=$comentarios[$i][1];
				$comen = ExperienciaBD::buscarComentario($valor);
				
					echo '<div id="comentario">';
				echo '<p>'.$comen["COMENTARIO"].'</p>';
				echo '<p>Por: '.$comen["ESCRITOR"].'<p>';
				echo '</div>';
			}
		}
		if (isset($_SESSION["login"])){
			echo '<div id="nuevoComentario">';
			echo '<form method="post" action="comentarioCreado.php?id='.$id.'">';
			echo '<h3>Cree un comentario:</h3>';
			echo '<p><textarea rows="5" cols="50" name="com" id="textoComentario"/></textarea></p>';
			echo '<input type="submit" value="Enviar" name="comentario" id="crearComentario">';
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
			<div id="ExperienciaConcreta">
			<?php
				mostrarExperiencia($experiencia,$comentarios,$id,$idFoto);
			?>
			</div>
		</div>
		
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	</body>
</html>