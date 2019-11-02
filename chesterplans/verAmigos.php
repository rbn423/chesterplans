<?php
	require_once("includes/config.php");
	require_once("includes/BD/AmigosBD.php");
	require_once("includes/BD/Usuario.php");

	$nick = $_SESSION["nick"];

	function mostrarAmigos($nick){
		$amigos = AmigosBD::buscaAmigos($nick);
		$nAmigos = count($amigos);
			if ($nAmigos > 0){
				for ($i=0;$i<$nAmigos;$i++){
					$usuario = Usuario::buscaUsuario($amigos[$i]);
					if($i!=$nAmigos-1)
						echo '<div id="lista">';
					else
						echo '<div id="ultimolista">';
					echo '<div id="info">';
						echo '<h2>Nick: '.$usuario->nick().'</h2>';
						echo '<p>Nombre: '.$usuario->nombre().'</p>';
						echo '<p>Puntos: '.$usuario->puntos().'</p>';
					echo '</div>';
					echo '<div id="foto">';
					echo '</div>';
					echo '<form method="post" action="VerPublicaciones.php?nick='.$usuario->nick().'">';
						echo '<div id="boton">';
						echo '<input type="submit" value="Ver experiencias">';
						echo '</div>';
					echo '</form>';					
					echo '</div>';
				}
			}
			else
				echo "No has agregado a ningún amigo todavia.";
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
				mostrarAmigos($nick);
			?>		
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
