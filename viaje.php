<?php
	require("includes/config.php");
	require("includes/ViajeBD.php");
	
	$id = $_GET["id"];
	$viaje= ViajeBD::buscarViaje($id);
	$comentarios = ViajeBD::buscarlistaComentarios($id);
	$fotos = ViajeBD::buscarListaFotos($id);

	function mostrarViaje($viaje, $comentarios,$fotos){

		echo '<h1>'.$viaje["TITULO"].'</h1>';
		echo '<p>'.$viaje["DESCB"].'<p>';
		echo '<p>'.$viaje["DESCG"].'<p>';
		echo '<p>'.$viaje["FOTO"].'<p>';

		echo '<p> Creador del viaje: '.$viaje["CREADOR"].'<p>';
		echo '<p> Fecha de inicio: '.$viaje["FECHAINI"].'    Fecha de fin: '.$viaje["FECHAFIN"].'</p>';
		echo '<p>Precio: '.$viaje["PRECIO"].'</p>';
		
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
		if (isset($_SESSION["login"])){
			echo '<div id="nuevoComentario">';
			echo '<p>Crea tu comentario</p>';
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
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<div id="ViajeConcreto">
				<?php
					mostrarViaje($viaje, $comentarios, $fotos);		
				?>
				</div>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>