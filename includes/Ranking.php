<?php 
	require("config.php");
	require_once("Usuario.php");
	require_once("RankingBD.php");

	class Ranking{

		public static function mostrarGeneral(){
			$nicks = RankingBD::buscar();
			$numero = count($nicks);
			$html = '<div id="tituloRanking">';
			$html .= "<p>Ranking de puntos</p>";
			$html .= '</div>';
			for($i=0;$i<$numero;$i++){
				$html .='<div id="ranking">';
				$html .= '<div id="nick">'.$nicks[$i][0].'</div>';
				$html .= '<div id="puntos">'.$nicks[$i][1].' puntos</div>';
				$html .= "</div>";
			}
			return $html;
		}

		public static function mostrarAmigos($nick){
			$amigos = RankingBD::buscarAmigos($nick);
			$numero = count($amigos);
			$html = '<div id="tituloRanking">';
			$html .= '</div>';
			for($i=0;$i<$numero;$i++){
				$html .='<div id="ranking">';
				$html .= '<div id="nick">'.$amigos[$i]["nick"].'</div>';
				$html .= '<div id="puntos">'.$amigos[$i]["puntos"].' puntos</div>';
				$html .= "</div>";
			}
			return $html;
		}
	}
?>