<?php
	require_once("includes/config.php");
	require_once("includes/BD/DescuentoBD.php");

	$id = $_GET["id"];
	$nick = $_SESSION["nick"];

	DescuentoBD::adquirirDescuento($id, $nick);
	header('Location: vistaDescuentos.php');

?>