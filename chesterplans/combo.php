<?php
	require_once("includes/config.php");
	require_once("includes/BD/ComboBD.php");
	require_once("includes/BD/ComprasBD.php");
	require_once("includes/BD/InteresesBD.php");
	require_once("includes/BD/ImagenBD.php");
	require_once("includes/BD/ViajeBD.php");
	require_once("includes/BD/ActividadBD.php");
	require_once("includes/BD/DescuentoBD.php");


	$id=$_GET["id"];
	if (isset($_POST["comprar"]))
		$comprado = $_POST["comprar"];
	else
		$comprado = NULL;
	if (isset($_POST["interesa"]))
		$interesado = $_POST["interesa"];
	else
		$interesado = NULL;
	$combo = ComboBD::getCombo($id);
	$viaje = $combo["VIAJE"];
	$actividades = $combo["ACTIVIDADES"];

	function mostrarCombo($combo, $viaje, $actividades, $id,$comprado,$interesado){
		$mayorDescuento["porcentaje"] = 0;
		if (isset($_SESSION["nick"])){
			$descuentos = DescuentoBD::buscarDescuentosUsuario($_SESSION["nick"]);
			$nDescuentos = count($descuentos);
			
			for ($i = 0 ; $i < $nDescuentos;$i++){
				if($descuentos[$i]["tipo"] == "todos" || $descuentos[$i]["tipo"] == "combo"){
					if ($descuentos[$i]["porcentaje"] > $mayorDescuento["porcentaje"]){
						$mayorDescuento = $descuentos[$i];
					}
				} 
			}
		}
		if ($comprado == "comprar"){
			echo "<div id='comprado'";
			echo "<p>Acabas de comprar este combo.</p>";
			echo "</div>";
			ComprasBD::insertaCompra($_SESSION["nick"],"combo",$id);
			InteresesBD::eliminaInteres($_SESSION["nick"],$id);
		}
		if ($interesado == "Me interesa"){
			echo "<div id='interesado'";
			echo "<p>Acabas de añadir este combo a tus intereses.</p>";
			echo "</div>";
			InteresesBD::insertaInteres($_SESSION["nick"],"combo",$id);
		}
		elseif ($interesado == "Ya no me interesa") {
			echo "<div id='nointeresado'";
			echo "<p>Acabas de eliminar este combo de tus intereses.</p>";
			echo "</div>";
			InteresesBD::eliminaInteres($_SESSION["nick"],$id);
		}
		$idFotoViaje = ViajeBD::buscarFoto($viaje["ID"]);
		
		echo '<p id="nombre">VIAJE</p>';
		echo '<div id="viajeCombo">';
		echo '<p id="tituloCon">'.$viaje["TITULO"].'</p>';
		echo '<p>'.$viaje["DESCB"].'</p>';
		echo '<p>'.$viaje["DESCG"].'</p>';
		if ($idFotoViaje != NULL){
			imagenBD::cargaImagen($idFotoViaje);
		}
		echo '<p> Fecha de inicio: '.$viaje["FECHAINI"].' Fecha de fin: '.$viaje["FECHAFIN"].'</p>';
		echo '</div>';
		echo '<p id="nombre">ACTIVIDADES</p>';
		echo '<div id="actividadesCombo">';
		$tam = count($actividades);
		for ($i=0;$i<$tam;$i++){
			$idFotoActividad = ActividadBD::buscarFoto($actividades[$i]["ID"]);
			if($i==0){
				echo '<div id="fila">';
				echo '<div id="act1">';
			}
			else if($i==1)
				echo '<div id="act2">';
			else{
				echo '</div>';
				echo '<div id="act3">';
			}
			echo "<h3>".($i+1).". ".$actividades[$i]['TITULO']."</h3>";
			echo "<h4>".$actividades[$i]["DESCB"]."</h4>";
			echo "<p>".$actividades[$i]["DESCG"]."</p>";
			echo "<p>Creador: ".$actividades[$i]["CREADOR"]."</p>";
			echo "<p>Fecha: ".$actividades[$i]["FECHA"]."</p>";
			if ($idFotoActividad != NULL){
				imagenBD::cargaImagen($idFotoActividad);
			}
			echo '</div>';
		}
		if($tam==1 || $tam==2)
			echo "</div>";
		echo '</div>';
		if ($mayorDescuento["porcentaje"] > 0){
			$nuevoPrecio = $combo["PRECIO"] - ($combo["PRECIO"] * $mayorDescuento["porcentaje"] / 100);
			echo '<p> Precio Anterior: <strike>'.$combo["PRECIO"].' €</strike> </p>';
			echo '<p> Nuevo precio: '.$nuevoPrecio.' € aplicando el descuento "'.$mayorDescuento["nombre"].'"</p>';
		}
		else
			echo "<h2>Precio: ".$combo['PRECIO']." €</h2>";
		
		if(isset($_SESSION["login"])){
			$compras = ComprasBD::compruebaCompra($_SESSION["nick"], $id);
			$intereses = InteresesBD::compruebaInteres($_SESSION["nick"], $id);
			echo '<div id="botoncesCon">';
			if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "basico"){
				if (!isset($compras)){
					echo '<div id="botonCompra">';
					echo '<form method="post" action="combo.php?id='.$id.'">';
					echo '<div id="boton">';
					echo '<input type="submit" value="Comprar" name="comprar">';
					echo '</div>';
					echo '</form>';
					echo '</div>';
					if (!isset($intereses)){
						echo '<div id="botonInteres">';
						echo '<form method="post" action="combo.php?id='.$id.'">';
						echo '<div id="boton">';
						echo '<input type="submit" value="Me interesa" name="interesa">';
						echo '</div>';
						echo '</form>';
						echo '</div>';
					}
					else{
						echo '<div id="botonInteres">';
						echo '<form method="post" action="combo.php?id='.$id.'">';
						echo '<div id="boton">';
						echo '<input type="submit" value="Ya no me interesa" name="interesa">';
						echo '</div>';
						echo '</form>';
						echo '</div>';
					}
				}
				else
					echo "<h3>Ya has adquirido este combo.</h3>";
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
			require_once("includes/comun/cabecera.php");
			require_once("includes/comun/menu.php");
			require_once("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<div id="ComboConcreto">
				<?php
					mostrarCombo($combo, $viaje, $actividades, $id,$comprado,$interesado);		
				?>
				</div>
			</div>
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
		
	
	</body>

</html>