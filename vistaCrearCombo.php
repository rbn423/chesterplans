<?php
	require("includes/config.php");
	require("includes/viajeBD.php");
	require("includes/actividadBD.php");
	
	function mostrarCrear(){
		$viajes = viajeBD::buscarViajeCreador($_SESSION["nick"]);
		$actividades = actividadBD::buscarActividadCreador($_SESSION["nick"]);
		$numViajes = count($viajes);
		$numActividades = count($actividades);
		if(isset($_SESSION["login"])){
			if($numViajes > 0){ 
				if ($numActividades > 0){
					echo '<form method="post" action="comboCreado.php">';
					echo'<div id="escribirCombo">';
					echo'<h2>Viaje:</h2>';
					echo'<p>Selecciona un viaje: <select name="viaje">';
					for ($i = 0; $i < $numViajes ; $i++){
						echo '<option value='.$viajes[$i][1].'>'.$viajes[$i][0].'</option>';
					}
					echo '</select></p>';
					echo '<h2>Actividades:</h2>';
					echo '<h3>Actividad 1:</h3>';
					echo'<p>Selecciona una actividad: <select name="actividad1">';
					echo '<option value=""></option>';
					for ($i = 0; $i < $numActividades ; $i++){
						echo '<option value='.$actividades[$i][1].'>'.$actividades[$i][0].'</option>';
					}
					echo '</select></p>';
					echo '<h3>Actividad 2:</h3>';
					echo'<p>Selecciona una actividad: <select name="actividad2">';
					echo '<option value=""></option>';
					for ($i = 0; $i < $numActividades ; $i++){
						echo '<option value='.$actividades[$i][1].'>'.$actividades[$i][0].'</option>';
					}
					echo '</select></p>';
					echo '<h3>Actividad 3:</h3>';
					echo'<p>Selecciona una actividad: <select name="actividad3">';
					echo '<option value=""></option>';
					for ($i = 0; $i < $numActividades ; $i++){
						echo '<option value='.$actividades[$i][1].'>'.$actividades[$i][0].'</option>';
					}
					echo '</select></p>';
					echo "<h2>Precio:</h2>";
					echo "<p>Introduzca el precio que tendrá su combo: ";
					echo'<p><textarea rows="1" cols="5" name="precio"></textarea>€</p>';
					echo'<p><input type="submit" value="crear combo"/></p>';
					echo'</div>';
					echo'</form>';
				}
				else{
					echo "No tienes actividades creadas para poder hacer un combo.";
				}
			}
			else{
				echo "No tienes viajes creados para poder hacer un combo.";
			}
		}
		else{
			echo '<h1>Usuario sin registrar</h1>' ;
			echo '<p>registrarte para poder compartir contenido creado por ti.</p>';			
		}
	}
?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Crear Combo </title>
	</head>
	<body>

		<?php
			$_SESSION["vista"] = "crearCombo";
			require("includes/comun/cabecera.php");
			require("includes/comun/menu.php");
			require("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					require("menuempresa.php");
					mostrarCrear();
				?>
			</div>
		<?php
			require("includes/comun/derecha.php");
			require("includes/comun/pie.php");
		?>
		
	
	</body>

</html>