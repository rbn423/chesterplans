<div id="cabecera">
	<a href="index.php"><img src="imagenes/logo.png"> </a>
	<?php
		if(!isset($_SESSION["login"])){
			require('login.php');
		}
		else{
			require('registrado.php');
		}
	?>	
</div>
