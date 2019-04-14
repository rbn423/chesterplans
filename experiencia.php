<?php
	require("includes/config.php");
	$conn = $app->conexionBd();
	
	$id = $_GET["id"];
	$sql = "SELECT * FROM experiencias where id = '$id'";
	$experiencia = $conn->query($sql);
	$experiencia = $experiencia->fetch_assoc();
	$idcomen = $experiencia["COMENTARIO"];
	$query = "SELECT * FROM comentario where id = '$idcomen'";//esta query habra que cambiarla orque habra que llamar a todos los comentarios
	$comentario = $conn->query($query);

	if (isset($_POST['like'])){
		if($_POST['like'] == 'Me gusta'){
			$query = "INSERT INTO megustas(NICKUSUARIO, IDEXPERIENCIA) VALUES ('".$_SESSION['nick']."','".$id."')";
			$conn->query($query);
			$query = "UPDATE usuario SET PUNTOS = puntos+'1' WHERE nick = '".$experiencia['CREADOR']."'";
			$conn->query($query);
			$query = "UPDATE experiencias SET likes = likes+'1' WHERE id = '$id'";
			$conn->query($query);
		}
		else{
			$query = "DELETE FROM megustas WHERE NICKUSUARIO = '".$_SESSION['nick']."' AND IDEXPERIENCIA = '".$id."'";
			$conn->query($query);
			$query = "UPDATE usuario SET PUNTOS = puntos-'1' WHERE nick = '".$experiencia['CREADOR']."'";
			$conn->query($query);
			$query = "UPDATE experiencias SET likes = likes-'1' WHERE id = '$id'";
			$conn->query($query);
		}
	}

	function mostrarExperiencia($experiencia,$comentario,$id,$conn){
		echo '<h1>'.$experiencia["TITULO"].'</h1>';
		echo '<p>'.$experiencia["DESCB"].'<p>';
		echo '<p>'.$experiencia["DESCG"].'<p>';
		echo '<p>'.$experiencia["FOTO"].'<p>';
		echo '<p> Autor de la experiencia '.$experiencia["CREADOR"].'<p>';
		if($comentario->num_rows>0){
			$comentario = $comentario->fetch_assoc();
			echo '<p>Comentarios: '.$comentario["COMENTARIO"].'. Comentario escrito por: '.$comentario["ESCRITOR"].'<p>';
		}
		if (isset($_SESSION["login"])){
			echo '<div id="nuevoComentario">';
			echo '<p>Crea tu comentario</p>';
			echo '</div>';
			$query="SELECT * FROM megustas WHERE nickusuario = '". $_SESSION['nick']. "' AND idexperiencia = '$id'";
			$resultado = $conn->query($query);
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
					mostrarExperiencia($experiencia,$comentario,$id,$conn);
				?>
				</div>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	</body>
</html>