<?php
	require_once("includes/config.php");
	
	$fecha = htmlspecialchars(trim(strip_tags($_REQUEST["fecha"])));
	$fechaactual = date("Ymd");

	$fecha = date("Ymd", strtotime($fecha));

	if($fecha >= $fechaactual)
		echo "bien";
	else
		echo "mal";
	
?>