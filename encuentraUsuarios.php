<?php
	require_once("includes/config.php");
	require_once("includes/Usuario.php");
	require_once("includes/AmigosBD.php");
	
	$nick = $_SESSION["nick"];
	if (isset($_SESSION["busqueda"])){
		$busqueda = $_SESSION["busqueda"];
		unset($_SESSION['busqueda']);
	}
	else
		$busqueda = $_POST["usuarios"];

	function mostrarUsuarios($busqueda, $nick){
		if ($busqueda != NULL){
			$usuarios = Usuario::buscadorUsuario($busqueda);
			$nUsuarios = count($usuarios);
			if ($nUsuarios > 0){
				for ($i=0;$i<$nUsuarios;$i++){
					$nickUsuario = $usuarios[$i][0];
					$nombreUsuario = $usuarios[$i][1];
					$tipoUsuario = $usuarios[$i][6];
					$puntosUsuario = $usuarios[$i][7];
					if ($nickUsuario != $nick && $tipoUsuario != "empresa"){
						if($i!=$nUsuarios-1)
							echo '<div id="lista">';
						else
							echo '<div id="ultimolista">';
						echo '<div id="info">';
						echo '<h2>Nick: '.$nickUsuario.'</h2>';
						echo '<p>Nombre: '.$nombreUsuario.'</p>';
						echo '<p>Puntos: '.$puntosUsuario.'</p>';
						echo '</div>';
						echo '<div id="boton">';
						if (AmigosBD::compruebaAmigos($nickUsuario,$nick))
							echo "Ya eres amigo de este usuario";
						else{
							if (AmigosBD::compruebaSolicitud($nick, $nickUsuario)){
								echo "Solicitud enviada";
							}
							elseif(AmigosBD::compruebaSolicitud($nickUsuario,$nick )){
								echo '<form method="post" action="AceptarSolicitud.php">';
								echo '<input type="hidden" name="emisor" value="'.$nickUsuario.'"/>';
								echo '<input type="hidden" name="receptor" value="'.$nick.'"/>';
								echo '<input type="submit" value="Aceptar solicitud">';
								echo '</form>';
								echo '<form method="post" action="RechazarSolicitud.php">';
								echo '<input type="hidden" name="emisor" value="'.$nickUsuario.'"/>';
								echo '<input type="hidden" name="receptor" value="'.$nick.'"/>';
								echo '<input type="submit" value="Rechazar solicitud">';
								echo '</form>';
							}
							else{
								echo '<form method="post" action="EnviarSolicitud.php?receptor='.$nickUsuario.'">';
									echo '<input type="hidden" name="usuarios" value="'.$busqueda.'"/>';
									echo '<input type="submit" value="Enviar solicitud">';
								echo '</form>';
							}
						}
						echo '<form method="post" action="VerPublicaciones.php?nick='.$nickUsuario.'">';
							echo '<input type="submit" value="Ver experiencias">';
						echo '</form>';
						echo '</div>';
						echo '</div>';
					}
				}
			}
			else
				echo "No se ha encontrado ningún usuario con ese nick o nombre.";
		}
		else
			echo "No has introducido nada en el buscador.";
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
				mostrarUsuarios($busqueda, $nick);
			?>		
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
