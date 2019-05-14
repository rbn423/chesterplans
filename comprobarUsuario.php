<?php
	require("includes/config.php");
	require_once ('includes/Usuario.php');
	
	$user = htmlspecialchars(trim(strip_tags($_REQUEST["user"])));
	$usuario = Usuario::buscaUsuario($user);
	
	if($usuario)
		echo "existe";
	else if($user == NULL)
		echo "vacio";
	else
		echo "disponible";
	
?>