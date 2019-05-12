<?php
	require("includes/config.php");
	require("includes/ActividadBD.php");
	require("includes/ComprasBD.php");
	require("includes/InteresesBD.php");

	$id=$_GET["id"];
	$actividad = ActividadBD::buscarActividad($id);	
	if (isset($_POST["comprar"]))
		$comprado = $_POST["comprar"];
	else
		$comprado = NULL;
	if (isset($_POST["interesa"]))
		$interesado = $_POST["interesa"];
	else
		$interesado = NULL;

	function mostrarActividad($actividad, $id,$comprado,$interesado){

		if ($comprado == "comprar"){
			echo "<div id='comprado'";
			echo "<p>Acabas de comprar esta actividad.</p>";
			echo "</div>";
			ComprasBD::insertaCompra($_SESSION["nick"],"actividad",$id);
		}
		if ($interesado == "Me interesa"){
			echo "<div id='interesado'";
			echo "<p>Acabas de añadir esta actividad a tus intereses.</p>";
			echo "</div>";
			InteresesBD::insertaInteres($_SESSION["nick"],"actividad",$id);
		}
		elseif ($interesado == "Ya no me interesa") {
			echo "<div id='interesado'";
			echo "<p>Acabas de eliminar esta actividad de tus intereses.</p>";
			echo "</div>";
			InteresesBD::eliminaInteres($_SESSION["nick"],$id);
		}

		echo '<h1>'.$actividad["TITULO"].'</h1>';
		echo '<p>'.$actividad["DESCB"].'<p>';
		echo '<p>'.$actividad["DESCG"].'<p>';
		echo '<p>'.$actividad["FOTO"].'<p>';
		echo '<p> Creador del viaje: '.$actividad["CREADOR"].'<p>';
		echo '<p> Fecha: '.$actividad["FECHA"].'</p>';
		echo '<p>Precio: '.$actividad["PRECIO"].' €</p>';

		if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "basico"){
			if(isset($_SESSION["login"])){
				$compras = ComprasBD::compruebaCompra($_SESSION["nick"], $id);
				$intereses = InteresesBD::compruebaInteres($_SESSION["nick"], $id);
				if (!isset($compras)){
					echo '<div id="botonCompra">';
					echo '<form method="post" action="actividad.php?id='.$id.'">';
					echo '<div id="boton">';
					echo '<input type="submit" value="comprar" name="comprar">';
					echo '</div>';
					echo '</form>';
					echo '</div>';
				}
				else
					echo "<h3>Ya has adquirido esta actividad.</h3>";
				if (!isset($intereses)){
					echo '<div id="botonInteres">';
					echo '<form method="post" action="actividad.php?id='.$id.'">';
					echo '<div id="boton">';
					echo '<input type="submit" value="Me interesa" name="interesa">';
					echo '</div>';
					echo '</form>';
					echo '</div>';
				}
				else{
					echo '<div id="botonInteres">';
					echo '<form method="post" action="actividad.php?id='.$id.'">';
					echo '<div id="boton">';
					echo '<input type="submit" value="Ya no me interesa" name="interesa">';
					echo '</div>';
					echo '</form>';
					echo '</div>';
				}
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
				<div id="ActividadConcreta">
				<?php
					mostrarActividad($actividad, $id,$comprado,$interesado);		
				?>
				</div>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>