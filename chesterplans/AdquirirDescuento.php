<?php
	require_once("includes/config.php");
	require_once("includes/BD/DescuentoBD.php");
	require_once("includes/BD/Usuario.php");

	$id = $_GET["id"];
	$nick = $_SESSION["nick"];
	$puntos = $_GET["puntos"];

	Usuario::restaPuntos($nick,$puntos);
	DescuentoBD::adquirirDescuento($id, $nick);
	header('Location: vistaDescuentos.php');

?>