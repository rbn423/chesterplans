<?php
	require("config.php");	

	class ComboBD{

		public static function getCombo($id){
			$conn = $app->conexionBd();
			$sql = "SELECT * FROM combo WHERE id = '$id'";
			$combo = $conn->query($sql);
			$combo= $combo->fetch_assoc();
			$idviaje = $combo["VIAJE"];
			$query = "SELECT * FROM viaje WHERE id = '$idviaje'";
			$viaje = $conn->query($query);
			$viaje = $viaje->fetch_assoc();
			$idActividades = array();
			$query = "SELECT idact FROM intercombo WHERE idcombo = '$id'";
			$idActividades = $conn->query($query);
			$idActividades = $idActividades->fetch_num();
			$tam =  count($idActividades);
			$actividades = array();
			for ($i = 0; $i < $tam ; $i++){
				$query = "SELECT * FROM actividad WHERE id = '". $idActividades[$i]."'";
				$actividad = $conn->query($query);
				$actividad = $actividad->fetch_assoc();
				$actividades[$i]=$actividad;
			}
			$resultado = array();
			$resultado['VIAJE'] = $viaje;
			$resultado['ACTIVIDADES'] = $actividades;
			$resultado['PRECIO'] = $combo['PRECIO'];
			return $resultado;
		}
 
		public static function getListaCombos(){

		}

		public static function insertCombo(){

		}



	}

?>