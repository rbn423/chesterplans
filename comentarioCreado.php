<?php
	require("includes/ExperienciaBD.php");
	
	$nick = $_SESSION["nick"];
	$id = $_GET["id"];
	$comentario= htmlspecialchars(trim(strip_tags($_REQUEST["com"])));;
	
	ExperienciaBD::nuevoComentario($id, $nick, $comentario);
	
	header("Location:experiencia.php?id=$id");
?>