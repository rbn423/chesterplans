<?php
	require("includes/config.php");
	$conn = $app->conexionBd();

	function mostrarCombos($conn){
		if($_POST){
			if ($_POST['precio'] == 0)
				$sql = "SELECT id, viaje, precio FROM combo ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
			else
				$sql = "SELECT id, viaje, precio FROM combo WHERE precio < ".$_POST['precio']. " ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
		}
		else
			$sql = "SELECT id, viaje, precio FROM combo";
		$busquedas = $conn->query($sql);
		$busquedas = $busquedas->fetch_all();
		$ncombos = count($busquedas);
		for ($i=0;$i<$ncombos;$i++){	
			$idcombo = $busquedas[$i][0];
			$idViaje = $busquedas[$i][1];
			$precio = $busquedas[$i][2];
			$sql = "SELECT titulo, descb FROM viaje WHERE id = '".$idViaje."'";
			$viaje = $conn->query($sql);
			$viaje = $viaje->fetch_assoc();
			$sql = "SELECT idact FROM intercombo WHERE idcombo = '".$idcombo."'";
			$idActividades = $conn->query($sql);
			$idActividades = $idActividades->fetch_all();
			$nactividades=count($idActividades);
			$html = "<ul>";
			for($i=0;$i<$nactividades;$i++){
				$sql= "SELECT titulo, descb FROM actividad WHERE id = '".$idActividades[$i][0]."'";
				$actividad = $conn->query($sql);
				$actividad = $actividad->fetch_assoc();
				$html .= "<li><h2>".$actividad['titulo'].": ".$actividad['descb']."</h2></li>";
			}
			if($i!=$ncombos-1){
				echo '<div id="lista">';
			}
			else
				echo '<div id="ultimolista">';
			echo '<div id="info">';
			echo '<h1>'.$viaje["titulo"].': '.$viaje["descb"].'</h1>';
			echo $html;
			echo '<p>Precio: '.$precio.' €</p>';
			echo '</div>';
			echo '<form method="post" action="combo.php?id='.$idcombo.'">';
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
			$_SESSION['vista'] = "combos";
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					mostrarCombos($conn);			
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>