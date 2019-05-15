<?php
	require("includes/config.php");
	require("includes/AmigosBD.php");

	$nickAceptado = $_POST["usuario"];
	$nick = $_SESSION["nick"];

	AmigosBD::insertaAmigos($nick, $nickAceptado);
	AmigosBD::eliminarSolicitud($nickAceptado, $nick);
	header('Location: verSolicitudes.php');

?>
