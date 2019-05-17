<?php
	require_once("includes/config.php");
	require_once("includes/BD/DescuentoBD.php");
	
	function mostrarDescuentos(){
		$descuentos=DescuentoBD::buscarDescuentosUsuario($_SESSION["nick"]);
		$nDescuentos=count($descuentos);
		if ($nDescuentos == 0)
			echo "Todavia no has adquirido ningún descuento.";
		else{
			for ($i=0;$i<$nDescuentos;$i++){
				if($i!=$nDescuentos-1)
					echo '<div id="listaDesc">';
				else
					echo '<div id="ultimolistaDesc">';
				echo '<p id="titulo">'.$descuentos[$i]["nombre"].'</p>';
				echo '<p>Este descuento es del '.$descuentos[$i]["porcentaje"].'% en ';
				if ($descuentos[$i]["tipo"] == "todos")
					echo "todos los productos.</p>";
				else
					echo "los productos del tipo ".$descuentos[$i]["tipo"].".</p>";
				echo "<p>Puntos necesarios: ".$descuentos[$i]["puntos"]." puntos.</p>";
				echo '</div>';
			}
		}
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Descuentos </title>
	</head>
	<body>

		<?php
			$_SESSION['vista'] = "descuentos";
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					if ($_SESSION["tipo"] == "admin")
						require_once('menuadmin.php');
					elseif($_SESSION["tipo"] == "basico")
						require_once("menubasico.php");
					mostrarDescuentos();
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>