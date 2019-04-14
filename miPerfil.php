<?php
	require("includes/config.php");
	if($_SESSION["tipo"]=="basico"){
		require("basico.php");
	}
	else {
		require("empresa.php");
	}
?>
