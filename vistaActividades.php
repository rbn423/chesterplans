<?php
	require("includes/config.php");
	$conn = $app->conexionBd();

	function mostrarActividades($conn){
		if($_POST){
			if ($_POST['precio'] == 0)
				$sql = "SELECT id FROM actividad ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
			else
				$sql = "SELECT id FROM actividad WHERE precio < ".$_POST['precio']. " ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
		}
		else
			$sql = "SELECT id FROM actividad";
		$busquedas = $conn->query($sql);
		$nactividades=$busquedas->num_rows;
		$busquedas = $busquedas->fetch_all();
		for ($i=0;$i<$nactividades;$i++){	
			$valor = $busquedas[$i][0];
			$sql = "SELECT * FROM actividad where id = '$valor'";
			$actividad = $conn->query($sql);
			$actividad = $actividad->fetch_assoc();
			if($i!=$nactividades-1){
				echo '<div id="lista">';
			}
			else{
				echo '<div id="ultimolista">';
			}
			echo '<div id="info">';
			echo '<h1>'.$actividad["TITULO"].'</h1>';
			echo '<p>'.$actividad["DESCB"].'<p>';
			echo '<p>Fecha: '.$actividad["FECHA"].'<p>';
			echo '<p>Precio: '.$actividad["PRECIO"].' €</p>';
			echo '</div>';
			echo '<form method="post" action="actividad.php?id='.$valor.'">';
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
			$_SESSION['vista'] = "actividades";
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					mostrarActividades($conn);			
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>