<?php
	require_once("includes/config.php");
	require_once("includes/BD/DescuentoBD.php");

	$idDescuento = $_GET["id"];

	DescuentoBD::eliminaDescuento($idDescuento);
	header('Location: vistaDescuentos.php');
?>