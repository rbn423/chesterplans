<?php
	require_once("includes/config.php");
	require_once("includes/Usuario.php");

	function mostrarUsuarios(){
		$usuarios = Usuario::buscadorUsuario("");
		$nUsuarios = count($usuarios);
		if ($nUsuarios > 0){
			for ($i=0;$i<$nUsuarios;$i++){
				$nickUsuario = $usuarios[$i][0];
				$nombreUsuario = $usuarios[$i][1];
				$tipoUsuario = $usuarios[$i][6];
				$puntosUsuario = $usuarios[$i][7];
				if ($tipoUsuario != "admin"){
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
						echo '<form method="post" action="eliminarUsuario.php">';
						echo '<input type="hidden" name="nick" value="'.$nickUsuario.'"/>';
						echo '<input type="hidden" name="tipo" value="'.$tipoUsuario.'"/>';
						echo '<input type="submit" value="EliminarUsuario">';
						echo '</form>';
					if ($tipoUsuario == "basico"){
						echo '<form method="post" action="VerPublicaciones.php?nick='.$nickUsuario.'">';
						echo '<input type="submit" value="Ver experiencias">';
					}
					elseif ($tipoUsuario == "empresa"){
						echo '<form method="post" action="vistaHistorial.php">';
						echo '<input type="hidden" name="nick" value="'.$nickUsuario.'"/>';
						echo '<input type="submit" value="Ver Publicaciones">';
					}
					echo '</form>';
					echo '</div>';
					echo '</div>';
				}
			}
		}
		else
			echo "No se ha encontrado ningún usuario.";
	}
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Usuarios </title>
	</head>
	<body>

		<?php
			require_once('includes/comun/cabecera.php');
			require_once('includes/comun/menu.php');
			require_once('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				require_once('menuadmin.php');
				mostrarUsuarios();
			?>		
		</div>			
		<?php
			require_once('includes/comun/derecha.php');
			require_once('includes/comun/pie.php');
		?>
		
	
	</body>

</html>
