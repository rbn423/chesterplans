<div id="cabecera">
	<a href="index.php"><img src="imagenes/logo.png"> </a>
	<?php
		if(!isset($_SESSION["login"])){
			require_once('login.php');
		}
		else{
			require_once('registrado.php');
		}
	?>	
</div>