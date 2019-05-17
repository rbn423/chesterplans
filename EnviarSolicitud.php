<?php
	require_once("includes/config.php");
	require_once("includes/BD/AmigosBD.php");

	$receptor = $_GET["receptor"];
	$emisor = $_SESSION["nick"];
	$_SESSION["busqueda"] = $_POST["usuarios"];
	
	AmigosBD::enviaSolicitud($emisor, $receptor);
	header('Location: encuentraUsuarios.php');

?>
