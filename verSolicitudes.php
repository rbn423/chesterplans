<?php
	require_once("includes/config.php");
	require_once("includes/AmigosBD.php");
	require_once("includes/Usuario.php");

	$nick = $_SESSION["nick"];

	function mostrarSolicitudes($nick){
		$nSolicitudes = AmigosBD::cuentaSolicitudes($nick);
		$solicitudes = AmigosBD::comprobarSolicitudes($nick);
			if ($nSolicitudes > 0){
				for ($i=0;$i<$nSolicitudes;$i++){
					$usuario = Usuario::buscaUsuario($solicitudes[$i][0]);
					if($i!=$nSolicitudes-1)
						echo '<div id="lista">';
					else
						echo '<div id="ultimolista">';
					echo '<div id="info">';
						echo '<h2>Nick: '.$usuario->nick().'</h2>';
						echo '<p>Nombre: '.$usuario->nombre().'</p>';
						echo '<p>Puntos: '.$usuario->puntos().'</p>';
					echo '</div>';
					
					echo '<div id="botonAmigos">';
						echo '<form method="post" action="AceptarSolicitud.php">';
						echo '<input type="hidden" name="emisor" value="'.$usuario->nick().'"/>';
						echo '<input type="hidden" name="receptor" value="'.$nick.'"/>';
						echo '<input type="submit" value="Aceptar solicitud">';
						echo '</form>';
						echo '<form method="post" action="RechazarSolicitud.php">';
						echo '<input type="hidden" name="emisor" value="'.$usuario->nick().'"/>';
						echo '<input type="hidden" name="receptor" value="'.$nick.'"/>';
						echo '<input type="submit" value="Rechazar solicitud">';
						echo '</form>';
					echo '</div>';
					echo '</div>';
				}
			}
			else
				echo "No quedan solicitudes de amistad.";
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
			<?php
				require_once('menubasico.php');
				mostrarSolicitudes($nick);
			?>		
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
