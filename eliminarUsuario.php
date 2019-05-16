<?php
	require_once("includes/config.php");
	require_once("includes/Usuario.php");
	require_once("includes/ExperienciaBD.php");
	require_once("includes/AmigosBD.php");
	require_once("includes/ActividadBD.php");
	require_once("includes/ComboBD.php");
	require_once("includes/ComprasBD.php");
	require_once("includes/DescuentoBD.php");
	require_once("includes/InteresesBD.php");
	require_once("includes/ViajeBD.php");

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