<?php
	require("includes/config.php");
	require("includes/ExperienciaBD.php");
	
	$id = $_GET["id"];
	$experiencia= ExperienciaBD::buscarExperiencia($id);
	$comentario = ExperienciaBD::buscarlistaComentarios($id);

	if (isset($_POST['like'])){
		if($_POST['like'] == 'Me gusta')
			ExperienciaBD::meGusta($_SESSION['nick'],$id,$experiencia['CREADOR']);
		else
			ExperienciaBD::noMeGusta($_SESSION['nick'],$id,$experiencia['CREADOR']);
	}

	function mostrarExperiencia($experiencia,$comentario,$id){
		echo '<div id="ExperienciaConcreta">';
		echo '<h1>'.$experiencia["TITULO"].'</h1>';
		echo '<p>'.$experiencia["DESCB"].'<p>';
		echo '<p>'.$experiencia["DESCG"].'<p>';
		echo '<p>'.$experiencia["FOTO"].'<p>';
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
		if (isset($_SESSION["login"])){
			echo '<div id="nuevoComentario">';
			echo '<p>Crea tu comentario</p>';
			echo '</div>';
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
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					require('menubasico.php');
					mostrarExperiencia($experiencia,$comentario,$id);
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	</body>
</html>