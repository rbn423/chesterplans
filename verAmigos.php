<?php
	require("includes/config.php");
	require("includes/AmigosBD.php");
	require("includes/Usuario.php");

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
					echo '<div id="boton">';
						echo '<form method="post" action="VerPublicaciones.php?nick='.$usuario->nick().'">';
						echo '<input type="submit" value="Ver experiencias">';
						echo '</form>';
					echo '</div>';
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
			require('includes/comun/cabecera.php');
			require('includes/comun/menu.php');
			require('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				require('menubasico.php');
				mostrarAmigos($nick);
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
