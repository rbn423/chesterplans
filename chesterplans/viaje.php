<?php
	require_once("includes/config.php");
	require_once("includes/BD/ViajeBD.php");
	require_once("includes/BD/ComprasBD.php");
	require_once("includes/BD/InteresesBD.php");
	require_once("includes/BD/ImagenBD.php");
	require_once("includes/BD/DescuentoBD.php");
	
	$id = $_GET["id"];
	if (isset($_POST["comprar"]))
		$comprado = $_POST["comprar"];
	else
		$comprado = NULL;
	if (isset($_POST["interesa"]))
		$interesado = $_POST["interesa"];
	else
		$interesado = NULL;
	$viaje= ViajeBD::buscarViaje($id);
	$comentarios = ViajeBD::buscarlistaComentarios($id);
	$foto = ViajeBD::buscarFoto($id);

	function mostrarViaje($viaje, $comentarios,$foto,$id,$comprado,$interesado){
		$mayorDescuento["porcentaje"] = 0;
		if (isset($_SESSION["nick"])){
			$descuentos = DescuentoBD::buscarDescuentosUsuario($_SESSION["nick"]);
			$nDescuentos = count($descuentos);
			
			for ($i = 0 ; $i < $nDescuentos;$i++){
				if($descuentos[$i]["tipo"] == "todos" || $descuentos[$i]["tipo"] == "viaje"){
					if ($descuentos[$i]["porcentaje"] > $mayorDescuento["porcentaje"]){
						$mayorDescuento = $descuentos[$i];
					}
				} 
			}
		}
		if ($comprado == "Comprar"){
			echo "<div id='comprado'";
			echo "<p>Acabas de comprar este viaje.</p>";
			echo "</div>";
			ComprasBD::insertaCompra($_SESSION["nick"],"viaje",$id);
			InteresesBD::eliminaInteres($_SESSION["nick"], $id);
		}
		if ($interesado == "Me interesa"){
			echo "<div id='interesado'";
			echo "<p>Acabas de añadir este viaje a tus intereses.</p>";
			echo "</div>";
			InteresesBD::insertaInteres($_SESSION["nick"],"viaje",$id);
		}
		else if ($interesado == "Ya no me interesa") {
			echo "<div id='nointeresado'";
			echo "<p>Acabas de eliminar este viaje de tus intereses.</p>";
			echo "</div>";
			InteresesBD::eliminaInteres($_SESSION["nick"],$id);
		}
		

		echo '<p id="tituloCon">'.$viaje["TITULO"].'</p>';		
		if ($foto != NULL){
			echo '<div id="segundo">';
			echo '<div id="fotoCon">';
			echo '<p>'.$viaje["FOTO"].'<p>';
			imagenBD::cargaImagen($foto);
			echo '</div>';
			echo '<div id="infoExperiencia">';
			echo '<p>'.$viaje["DESCB"].'<p>';
			echo '<p>'.$viaje["DESCG"].'<p>';
			echo '<p> Creador del viaje: '.$viaje["CREADOR"].'<p>';
			echo '<p> Fecha de inicio: '.$viaje["FECHAINI"].'    Fecha de fin: '.$viaje["FECHAFIN"].'</p>';
			if ($mayorDescuento["porcentaje"] > 0){
				$nuevoPrecio = $viaje["PRECIO"] - ($viaje["PRECIO"] * $mayorDescuento["porcentaje"] / 100);
				echo '<p> Precio Anterior: <strike>'.$viaje["PRECIO"].' €</strike> </p>';
				echo '<p> Nuevo precio: '.$nuevoPrecio.' € aplicando el descuento "'.$mayorDescuento["nombre"].'"</p>';
			}
			else
				echo '<p> Precio: '.$viaje["PRECIO"].' €</p>';
			echo '</div>';
			echo '</div>';
		}
		else {
			echo '<div id="infoExperienciaSolo">';
			echo '<p>'.$viaje["DESCB"].'<p>';
			echo '<p>'.$viaje["DESCG"].'<p>';
			echo '<p> Creador del viaje: '.$viaje["CREADOR"].'<p>';
			echo '<p> Fecha de inicio: '.$viaje["FECHAINI"].'    Fecha de fin: '.$viaje["FECHAFIN"].'</p>';
			if ($mayorDescuento["porcentaje"] > 0){
				$nuevoPrecio = $viaje["PRECIO"] - ($viaje["PRECIO"] * $mayorDescuento["porcentaje"] / 100);
				echo '<p> Precio Anterior: <strike>'.$viaje["PRECIO"].' €</strike> </p>';
				echo '<p> Nuevo precio: '.$nuevoPrecio.' € aplicando el descuento "'.$mayorDescuento["nombre"].'"</p>';
			}
			else
				echo '<p> Precio: '.$viaje["PRECIO"].' €</p>';
			echo '</div>';			
		}

		if (isset($_SESSION["tipo"]) && $_SESSION["tipo"] == "basico"){
			if(isset($_SESSION["login"])){
				$compras = ComprasBD::compruebaCompra($_SESSION["nick"], $id);
				$intereses = InteresesBD::compruebaInteres($_SESSION["nick"], $id);
				echo '<div id="botoncesCon">';
				if (!isset($compras)){
					echo '<div id="botonCompra">';
					echo '<form method="post" action="viaje.php?id='.$id.'">';
					echo '<div id="boton">';
					echo '<input type="submit" value="Comprar" name="comprar">';
					echo '</div>';
					echo '</form>';
					echo '</div>';
					if (!isset($intereses)){
						echo '<div id="botonInteres">';
						echo '<form method="post" action="viaje.php?id='.$id.'">';
						echo '<div id="boton">';
						echo '<input type="submit" value="Me interesa" name="interesa">';
						echo '</div>';
						echo '</form>';
						echo '</div>';
					}
					else{
						echo '<div id="botonInteres">';
						echo '<form method="post" action="viaje.php?id='.$id.'">';
						echo '<div id="boton">';
						echo '<input type="submit" value="Ya no me interesa" name="interesa">';
						echo '</div>';
						echo '</form>';
						echo '</div>';
					}
				}
				else
					echo "<h3>Ya has adquirido este viaje.</h3>";
				echo '</div>';
			}
		}

		$ncomentarios=count($comentarios);
		if($ncomentarios>0){
			for($i=0; $i<$ncomentarios; $i++){
				$valor=$comentarios[$i][1];
				$comen = viajeBD::buscarComentario($valor);
				if($i==0)
					echo '<div id="primercomentario">';
				else
					echo '<div id="comentario">';
				echo '<p>'.$comen["COMENTARIO"].'</p>';
				echo '<p>Por: '.$comen["ESCRITOR"].'<p>';
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
				<div id="ViajeConcreto">
				<?php
					mostrarViaje($viaje, $comentarios, $foto,$id,$comprado,$interesado);		
				?>
				</div>
			</div>
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
		
	
	</body>

</html>