<?php
	require_once("includes/config.php");
	require_once("includes/BD/DescuentoBD.php");
	require_once("includes/BD/Usuario.php");
	
	function mostrarDescuentos(){
		$descuentos=DescuentoBD::buscarDescuentos();
		$nDescuentos=count($descuentos);
		if ($nDescuentos == 0)
			echo "Todavia no hay ningún descuento creado.";
		else{
			for ($i=0;$i<$nDescuentos;$i++){
				if($i!=$nDescuentos-1)
					echo '<div id="lista">';
				else
					echo '<div id="ultimolista">';
				echo '<div id="info">';
				echo '<p id="titulo">'.$descuentos[$i]["nombre"].'</p>';
				echo '<p>Este descuento es del '.$descuentos[$i]["porcentaje"].'% en ';
				if ($descuentos[$i]["tipo"] == "todos")
					echo "todos los productos.</p>";
				else
					echo "los productos del tipo ".$descuentos[$i]["tipo"].".</p>";
				echo "<p>Puntos necesarios: ".$descuentos[$i]["puntos"]." puntos.</p>";
				echo '</div>';
				if($_SESSION["tipo"] == "admin"){
					echo '<form method="post" action="eliminarDescuento.php?id='.$descuentos[$i]["id"].'">';
					echo '<div id="boton">';
					echo '<input type="submit" value="Eliminar descuento">';
					echo '</div>';
					echo '</form>';
				}
				elseif($_SESSION["tipo"] == "basico"){
					if (DescuentoBD::compruebaDescuento($descuentos[$i]["id"],$_SESSION["nick"]))
						echo "Descuento adquirido";
					else{
						$puntos = Usuario::buscaPuntos($_SESSION["nick"]);
						if ($puntos >= $descuentos[$i]["puntos"]){
							echo '<form method="post" action="AdquirirDescuento.php?id='.$descuentos[$i]["id"].'&puntos='.$descuentos[$i]["puntos"].'">';
							echo '<div id="boton">';
							echo '<input type="submit" value="Adquirir descuento">';
							echo '</div>';
							echo '</form>';
						}
						else{
							echo '<form method="post" action="">';
							echo '<div id="boton">';
							echo '<input type="submit" value="Puntos insuficientes">';
							echo '</div>';
							echo '</form>';
						}
					}
				}
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