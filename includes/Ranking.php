<?php 
	require("config.php");

	class Ranking{

		public static function gestionar(){
			$nicks = self::buscar();
			return self::mostrar($nicks);
		}

		private static function buscar(){
			$app = Aplicacion::getSingleton();
			$conn = $app->conexionBd();
			$query = "SELECT nick, puntos FROM usuario ORDER BY PUNTOS DESC LIMIT 20";
			$Nicks = $conn->query($query);
			$Nicks = $Nicks->fetch_all();
			return $Nicks;
		}

		private static function mostrar($Nicks){
			$numero = count($Nicks);
			$html = "<h2>Ranking de puntos</h2>";
			for($i=0;$i<$numero;$i++){
				$html .= "<p>Nick: ".$Nicks[$i][0]." ".$Nicks[$i][1]." PUNTOS</p>";
			}
			return $html;
		}
	}
?>