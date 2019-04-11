<div id="cabecera">
	<img src="imagenes/logo.png">
	<?php
		if(!isset($_SESSION["login"])){
			require('login.php');
		}
		else{
			require('registrado.php');
		}
	?>	
</div>