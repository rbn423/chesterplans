<?php
	require_once("includes/config.php");
	if($_SESSION["tipo"]=="basico"){
		require_once("basico.php");
	}
	else {
		require_once("empresa.php");
	}
?>
