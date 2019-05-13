<?php
	require("includes/config.php");
	require("includes/ComboBD.php");

	function mostrarCombos(){
		$combos = ComboBD::getListaCombos();
		$ncombos = count($combos);
		for ($i=0;$i<$ncombos;$i++){	
			$idcombo = $combos[$i]["ID"];
			$idViaje = $combos[$i]["idViaje"];
			$viaje = $combos[$i]["VIAJE"];
			$precio = $combos[$i]["PRECIO"];
			$actividades = $combos[$i]["ACTIVIDADES"];
			$nactividades = count($actividades);
			if($i!=$ncombos-1){
				echo '<div id="lista">';
			}
			else
				echo '<div id="ultimolista">';
			echo '<div id="info">';
			echo '<p id="titulo">'.$combos[$i]["VIAJE"]["titulo"].': '.$combos[$i]["VIAJE"]["descb"].'</p>';
			echo "<ul>";
			for($j=0;$j<$nactividades;$j++){
				echo "<li><p>".$actividades[$j]['titulo'].": ".$actividades[$j]['descb']."</p></li>";
			}
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
					mostrarCombos();			
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>