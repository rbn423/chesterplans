<?php
	require_once("includes/config.php");
	if($_SESSION["tipo"]=="basico"){
		require_once("basico.php");
	}
	elseif ($_SESSION["tipo"] == "empresa") {
		require_once("empresa.php");
	}
	else
		require_once("admin.php");
?>
