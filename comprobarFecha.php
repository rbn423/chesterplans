<?php
	require_once("includes/config.php");
	
	$fecha = htmlspecialchars(trim(strip_tags($_REQUEST["fecha"])));
	$fechaactual = date("Ymd");
	$fecha.strtotime("Ymd");


	if($fecha > $fechaactual)
		echo "bien";
	else
		echo "mal";
	
?>