<?php
	require("includes/config.php");
	$nick = $_SESSION["nick"];
	$conn = $app->conexionBd();
	$query="SELECT id FROM experiencias WHERE CREADOR='$nick'";
	$experienciasCreadas=$conn->query($query)
		or die ($conn->error. " en la línea ".(__LINE__-1));
	
	//mysqli_close($conn);
	//}

	function mostrarExpCompartidas($experienciasCreadas, $conn){
		$nexperiencias=$experienciasCreadas->num_rows;
		if($nexperiencias==0){
			echo '<p>Aun no has creado ninguna experiencia</p>';
			echo '<p>Si quieres crear una experiencia <a href="vistaCrearExperiencia.php">pulsa aqui</a></p>';
		}
		else{
			$experienciasCreadas=$experienciasCreadas->fetch_all();
			for($i=0; $i<$nexperiencias; $i++){
				if($i!=$nexperiencias-1)
					echo '<div id="lista">';
				else
					echo '<div id="ultimolista">';
				$valor = $experienciasCreadas[$i][0];
				$sql = "SELECT * FROM experiencias where id = '$valor'";
				$experiencia = $conn->query($sql);
				$experiencia = $experiencia->fetch_assoc();
				echo '<div id="info">';
				echo '<h2>'.$experiencia["TITULO"].'</h2>';
				echo '<p>'.$experiencia["DESCB"].'<p>';
				echo '</div>';
				echo '<form method="post" action="experienciaBasico.php?id='.$valor.'">';						
				echo '<div id="boton">';
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
			require('includes/comun/cabecera.php');
			require('includes/comun/menu.php');
			require('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				require('menubasico.php');
				mostrarExpCompartidas($experienciasCreadas, $conn);
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
