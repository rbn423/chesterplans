<?php
	require_once("includes/config.php");
	require_once("includes/BD/AmigosBD.php");
	require_once("includes/Ranking.php");
	
	$nick = $_SESSION["nick"];

	function mostrarSocial($nick){
		$nSolicitudes = AmigosBD::cuentaSolicitudes($nick);
		$ranking = Ranking::mostrarAmigos($nick);
		echo "<div id='buscador'>";
			echo '<form method="post" action="encuentraUsuarios.php">';
				echo'<p>Buscar usuarios:</p> <p><input type="text" name="usuarios" id="textoBus"/></p>';
				echo'<p><input type="submit" value="Buscar" id="botonBus"/></p>';
			echo'</form>';
		echo "</div>";
		echo "<div id='solicitudes'>";
			if ($nSolicitudes == 0)
				echo "<p>No tienes solicitudes de amistad pendientes.</p>";
			else{
				echo "<p>Tienes ".$nSolicitudes." solicitudes de amistad pendientes.";
				echo '<form method="post" action="verSolicitudes.php">';
					echo'<input type="submit" value="Ver Solicitudes"/></p>';
				echo'</form>';
			}
			echo '<form method="post" action="verAmigos.php">';
				echo '<p>Aquí puedes ver tu lista de amigos</p>';
				echo'<input type="submit" value="Ver amigos"/></p>';
			echo'</form>';
		echo "</div>";
		echo "<div id='rankingAmi'>";
			echo '<p id="titRankingAmi">Ranking de puntos de amigos</p>';
			echo $ranking;
		echo "</div>";
		echo "<div id='descuentos'>";
			echo "<p>Descuentos adquiridos:";
			echo '<form method="post" action="verDescuentosAdquiridos.php">';
				echo'<input type="submit" value="Ver Mis Descuentos"/></p>';
			echo'</form>';
			echo "<p>Adquirir descuentos:";
				echo '<form method="post" action="vistaDescuentos.php">';
					echo'<input type="submit" value="Conseguir Descuentos"/></p>';
				echo'</form>';
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
			require_once('includes/comun/cabecera.php');
			require_once('includes/comun/menu.php');
			require_once('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<div id="usuario">
			<?php
				require_once('menubasico.php');
				mostrarSocial($nick);
			?>	
			</div>
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
