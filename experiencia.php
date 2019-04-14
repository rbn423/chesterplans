<?php
	require("includes/config.php");
	$conn = $app->conexionBd();
	
	$id = $_GET["id"];
	$sql = "SELECT * FROM experiencias where id = '$id'";
	$experiencia = $conn->query($sql);
	$experiencia = $experiencia->fetch_assoc();
	$idcomen = $experiencia["COMENTARIO"];
	$query = "SELECT * FROM intercomentario where id = '$id'";//esta query busca todos los comentarios de la experiencia
	$comentario = $conn->query($query);

	if (isset($_POST['like'])){
		if($_POST['like'] == 'Me gusta'){
			$query = "INSERT INTO megustas(NICKUSUARIO, IDEXPERIENCIA) VALUES ('".$_SESSION['nick']."','".$id."')";
			$conn->query($query);
			$query = "UPDATE usuario SET PUNTOS = puntos+'1' WHERE nick = '".$experiencia['CREADOR']."'";
			$conn->query($query);
		}
		else{
			$query = "DELETE FROM megustas WHERE NICKUSUARIO = '".$_SESSION['nick']."' AND IDEXPERIENCIA = '".$id."'";
			$conn->query($query);
			$query = "UPDATE usuario SET PUNTOS = puntos-'1' WHERE nick = '".$experiencia['CREADOR']."'";
			$conn->query($query);
		}
	}

	function mostrarExperiencia($experiencia,$comentario,$id,$conn){
		echo '<h1>'.$experiencia["TITULO"].'</h1>';
		echo '<p>'.$experiencia["DESCB"].'<p>';
		echo '<p>'.$experiencia["DESCG"].'<p>';
		echo '<p>'.$experiencia["FOTO"].'<p>';
		echo '<p> Autor de la experiencia '.$experiencia["CREADOR"].'<p>';
		if (isset($_SESSION["login"])){
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
		if($comentario->num_rows>0){
			$ncomentarios=$comentario->num_rows;
			$comentario = $comentario->fetch_all();
			for($i=0; $i<$ncomentarios; $i++){
				$valor=$comentario[$i][1];
				$que= "SELECT * from comentario where id='$valor'";
				$comen=$conn->query($que);
				$comen= $comen->fetch_assoc();
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