<div id="logout">
		<form method="post" action="logout.php">
		<?php
			echo '<p>Hola, '.$_SESSION["nombre"].' <a href="miPerfil.php">Mi Perfil</a></p>';
		?>
		<div id="boton">
			<input type="submit" value="Logout">
		</div>
	</form>
</div>