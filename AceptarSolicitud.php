<?php
	require_once("includes/config.php");
	require_once("includes/AmigosBD.php");

	$emisor = $_POST["emisor"];
	$receptor = $_POST["receptor"];

	AmigosBD::insertaAmigos($receptor, $emisor);
	AmigosBD::eliminarSolicitud($emisor, $receptor);
	header('Location: verSolicitudes.php');

?>