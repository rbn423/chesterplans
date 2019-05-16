<?php
	require("includes/config.php");
	require("includes/AmigosBD.php");

	$emisor = $_POST["emisor"];
	$receptor = $_POST["receptor"];

	AmigosBD::eliminarSolicitud($emisor, $receptor);
	header('Location: verSolicitudes.php');

?>