<div id="cabecera">
	<img src="imagenes/logo.png">
	<?php
		if(!isset($_SESSION["login"])){
			require('login.php');
		}
		else{
			echo '<div id="login">';
			echo '<form method="post" action="logout.php">';
			echo '<p>Hola, '.$_SESSION["nick"].'</p>';
			echo '<input type="submit" value="Logout">';
			echo '</form>';
			echo'</div>';
		}
	?>	
</div>