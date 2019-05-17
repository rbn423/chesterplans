<?php
	require_once("includes/config.php");
	require_once("includes/BD/ExperienciaBD.php");
	require_once("includes/BD/imagenBD.php");
	
	$id = $_GET["id"];
	$experiencia= ExperienciaBD::buscarExperiencia($id);
	$comentarios = ExperienciaBD::buscarlistaComentarios($id);
	$idFoto = ExperienciaBD::buscarFoto($id);
	
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
		if (isset($_SESSION["login"]) && $_SESSION["tipo"] == "basico"){
			$resultado=ExperienciaBD::tieneMegusta($_SESSION['nick'], $id);
			if ($resultado->num_rows == 1){
				echo '<div id="botonNoMeGusta">';
				echo '<div id="boton" class="Like">';
				echo '<input type="image" value="No me gusta" name="like" src="imagenes/like.png" >';
				echo '</div>';
				echo '</div>';
			}
			else{
				echo '<div id="botonMeGusta">';
				echo '<div id="boton" class="noLike">';
				echo '<input type="image" value="Me gusta" name="like" src="imagenes/nolike.png" id="nolike">';
				echo '</div>';
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
		if (isset($_SESSION["login"]) && $_SESSION["tipo"] == "basico"){
			echo '<div id="nuevoComentario">';
			echo '<form method="post" action="comentarioCreado.php?id='.$id.'">';
			echo '<h3>Cree un comentario:</h3>';
			echo '<p><textarea rows="5" cols="55" name="com" id="textoComentario"/></textarea></p>';
			echo '<input type="submit" value="Enviar" name="comentario" id="crearComentario">';
			echo '</form>';
			echo '</div>';
		}
	}
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script>
		$(document).ready(function() {
			var URLactual = window.location;
			var stringUrl= String(URLactual);
			var url = stringUrl.split("/");
			var id =url[url.length-1].split("=");
			
			function actualizar(data, status){
				location.reload();				
			}
			
			$(".noLike").click(function(){
				var url="darLike.php?id="+ id[id.length-1];
				$.get(url,actualizar);
			});
			
			$(".Like").click(function(){
				var url="quitarLike.php?id="+ id[id.length-1];
				$.get(url,actualizar);
			});
		})
		</script>
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
			<div id="ExperienciaConcreta">
			<?php
				mostrarExperiencia($experiencia,$comentarios,$id,$idFoto);
			?>
			</div>
		</div>
		
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
		
	</body>
</html>