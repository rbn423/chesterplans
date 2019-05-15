<?php
	require("includes/config.php");
	require("includes/AmigosBD.php");
	
	$nick = $_SESSION["nick"];

	function mostrarSocial($nick){
		$nSolicitudes = AmigosBD::cuentaSolicitudes($nick);

		echo "<div id='buscador'>";
			echo '<form method="post" action="encuentraUsuarios.php">';
				echo'<p>Buscar usuarios: <input type="text" name="usuarios"/>';
				echo'<input type="submit" value="Buscar"/></p>';
			echo'</form>';
		echo "</div>";
		echo "<div id='solicitudes'>";
			if ($nSolicitudes == 0)
				echo "<p>No tienes solicitudes de amistad pendientes.</p>";
			else{
				echo "<p>Tienes ".$nSolicitudes." solicitudes de amistad pendientes.";
				echo '<form method="post" action="verSolicitudes.php">';
					echo'<input type="submit" value="Ver"/></p>';
				echo'</form>';
			}
		echo "</div>";
		echo "<div id='amigos'>";
			echo '<form method="post" action="verAmigos.php">';
				echo'<input type="submit" value="Ver amigos"/></p>';
			echo'</form>';
		echo "</div>";
		echo "<div id='ranking'>";

		echo "</div>";
		echo "<div id='descuentos'>";

		echo "</div>";
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Social </title>
	</head>
	<body>

		<?php
			require('includes/comun/cabecera.php');
			require('includes/comun/menu.php');
			require('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				require('menubasico.php');
				mostrarSocial($nick);
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
