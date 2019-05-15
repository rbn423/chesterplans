<?php
require("config.php");
require_once("AmigosBD.php");

class RankingBD {

	public static function buscar(){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$query = "SELECT nick, puntos FROM usuario WHERE tipo = 'basico' ORDER BY PUNTOS DESC LIMIT 20";
		$Nicks = $conn->query($query);
		$Nicks = $Nicks->fetch_all();
		return $Nicks;
	}

	public static function buscarAmigos($nick){
		$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		$amigos = AmigosBD::buscaAmigos($nick);
		$nAmigos = count($amigos);
		$resultado = array();
		for ($i = 0; $i < $nAmigos ; $i++){
			$query = "SELECT puntos FROM usuario WHERE nick = '".$amigos[$i]."'";
			$puntos = $conn->query($query);
			$puntos = $puntos->fetch_all();
			$resultado[$i]["nick"] = $amigos[$i];
			$resultado[$i]["puntos"] = $puntos[0][0];
		}
		$query = "SELECT puntos FROM usuario WHERE nick = '$nick'";
		$propio = $conn->query($query);
		$propio = $propio->fetch_all();
		$resultado[$nAmigos]["nick"] = $nick;
		$resultado[$nAmigos]["puntos"] = $propio[0][0];

		foreach ($resultado as $key => $row) {
		    $aux[$key] = $row['puntos'];
		}
		array_multisort($aux, SORT_DESC, $resultado);

		return $resultado;
	}
}

?>