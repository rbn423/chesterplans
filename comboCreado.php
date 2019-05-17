<?php
	require_once("includes/config.php");
	require_once("includes/BD/ComboBD.php");
	require_once("includes/BD/viajeBD.php");

	$nick = $_SESSION["nick"];
	$viaje = htmlspecialchars(trim(strip_tags($_REQUEST["viaje"])));
	$actividad1 = htmlspecialchars(trim(strip_tags($_REQUEST["actividad1"])));
	$actividad2 = htmlspecialchars(trim(strip_tags($_REQUEST["actividad2"])));
	$actividad3 = htmlspecialchars(trim(strip_tags($_REQUEST["actividad3"])));
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["precio"])));

	function mostrarCreada($viaje, $actividad1, $actividad2, $actividad3, $nick, $precio){
		$crear = false;
		if($viaje != ""){
			if ($actividad1 != ""){
				$crear = true;
			}
			else{
				$actividad1 = "vacia1";
			}
			if($actividad2 != ""){
				$crear = true;
			}
			else{
				$actividad2 = "vacia2";
			}
			if($actividad3 != ""){
				$crear = true;
			}
			else{
				$actividad3 = "vacia3";
			}
			if ($crear){
				if ($actividad1 == $actividad2 || $actividad1 == $actividad3 || $actividad2 == $actividad3){
					echo "Has seleccionado actividades repetidas, por lo que no se ha podido crear el combo.";
				}
				else{
					if (is_numeric($precio) && $precio > 0){
						$f=getdate()[0];
						$id=$nick.$f;
						$tituloViaje = viajeBD::buscarNombreViaje($viaje);
						comboBD::insertCombo($viaje, $nick, $id, $precio, $tituloViaje);
						if ( $actividad1 != "vacia1"){
							comboBD::insertActividadCombo($id, $actividad1);
						}
						if ( $actividad2 != "vacia2"){
							comboBD::insertActividadCombo($id, $actividad2);
						}
						if ( $actividad3 != "vacia3"){
							comboBD::insertActividadCombo($id, $actividad3);
						}
						echo "Tu combo ha sido creado correctamente.";
					}
					else{
						echo "El precio no es válido.";
					}
				}
			}
			else{
				echo "No hay ninguna actividad seleccionada, por lo que no se ha podido crear un combo.";
			}
		}
		else{
			echo "El viaje está vacio, por lo que no se ha podido crear un combo.";
		}
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Combo Creado </title>
	</head>
	<body>

		<?php
			require_once('includes/comun/cabecera.php');
			require_once('includes/comun/menu.php');
			require_once('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				require_once('menuempresa.php');
				mostrarCreada($viaje, $actividad1, $actividad2, $actividad3, $nick, $precio);
			?>		
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>