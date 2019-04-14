<?php
	require("includes/config.php");
	$conn = $app->conexionBd();

	function mostrarViajes($conn){
		if($_POST){
			if ($_POST['precio'] == 0)
				$sql = "SELECT id FROM viaje ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
			else
				$sql = "SELECT id FROM viaje WHERE precio < ".$_POST['precio']. " ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
		}
		else
			$sql = "SELECT id FROM viaje";
		$busquedas = $conn->query($sql);
		$nviajes=$busquedas->num_rows;
		$busquedas = $busquedas->fetch_all();
		for ($i=0;$i<$nviajes;$i++){	
			$valor = $busquedas[$i][0];
			$sql = "SELECT * FROM viaje where id = '$valor'";
			$viaje = $conn->query($sql);
			$viaje = $viaje->fetch_assoc();
			if($i!=$nviajes-1){
				echo '<div id="viaje">';
			}
			else{
				echo '<div id="ultimoviaje">';
			}
			echo '<div id="info">';
			echo '<h1>'.$viaje["TITULO"].'</h1>';
			echo '<p>'.$viaje["DESCB"].'<p>';
			echo '<p>De '.$viaje["FECHAINI"].' a '.$viaje["FECHAFIN"]. '<p>';
			echo '<p>Precio: '.$viaje["PRECIO"].'</p>';
			echo '</div>';
			echo '<form method="post" action="viaje.php?id='.$valor.'">';
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
			$_SESSION['vista'] = "viajes";
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					mostrarViajes($conn);			
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>