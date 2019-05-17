<?php
	require_once("includes/config.php");
	require_once("includes/BD/ExperienciaBD.php");
	
	
	$id = $_GET["id"];
	$experiencia= ExperienciaBD::buscarExperiencia($id);
	
	ExperienciaBD::meGusta($_SESSION['nick'],$id,$experiencia['CREADOR']);
	echo "fin";
	
?>