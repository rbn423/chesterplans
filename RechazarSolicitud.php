<?php
	require_once("includes/config.php");
	require_once("includes/BD/AmigosBD.php");

	$emisor = $_POST["emisor"];
	$receptor = $_POST["receptor"];

	AmigosBD::eliminarSolicitud($emisor, $receptor);
	header('Location: verSolicitudes.php');

?>