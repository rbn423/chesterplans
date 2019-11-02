<?php
	require_once("includes/config.php");
	require_once("includes/BD/Usuario.php");
	require_once("includes/BD/ExperienciaBD.php");
	require_once("includes/BD/AmigosBD.php");
	require_once("includes/BD/ActividadBD.php");
	require_once("includes/BD/ComboBD.php");
	require_once("includes/BD/ComprasBD.php");
	require_once("includes/BD/DescuentoBD.php");
	require_once("includes/BD/InteresesBD.php");
	require_once("includes/BD/ViajeBD.php");

	$nick = $_POST["nick"];
	$tipo = $_POST["tipo"];
	
	if ($tipo == "basico"){
		ExperienciaBD::eliminarExperiencias($nick);
		AmigosBD::eliminarAmigos($nick);
		ComprasBD::eliminarCompras($nick);
		//eliminar los descuentos adquiridos
		InteresesBD::eliminarIntereses($nick);
		Usuario::eliminaUsuario($nick);
	}
	elseif($tipo == "empresa"){
		ActividadBD::eliminarActividades($nick);
		ViajeBD::eliminarViajes($nick);
		ComboBD::eliminarCombos($nick);
		Usuario::eliminaUsuario($nick);
	}
	
	header('Location: vistaUsuarios.php');
?>