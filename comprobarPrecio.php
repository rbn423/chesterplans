<?php
	require_once("includes/config.php");
	
	$precio = htmlspecialchars(trim(strip_tags($_REQUEST["precio"])));
	
	if($precio > 0)
		echo "bien";
	else
		echo "mal";
	
?>