<?php
	require("includes/ExperienciaBD.php");
	
	$nick = $_SESSION["nick"];
	$id = $_GET["id"];
	$comentario= $_POST["com"];
	
	ExperienciaBD::nuevoComentario($id, $nick, $comentario);
	
	header("Location:experiencia.php?id=$id");
?>