<?php
	require("config.php");	

	class ComboBD{

		public static function getCombo($id){
			$app = Aplicacion::getSingleton();
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
			$idActividades = $idActividades->fetch_all();
			$tam =  count($idActividades);

			$actividades = array();
			for ($i = 0; $i < $tam ; $i++){
				$query = "SELECT * FROM actividad WHERE id = '". $idActividades[$i][0]."'";
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
			$app = Aplicacion::getSingleton();
			$conn = $app->conexionBd();
			if($_POST){
				if ($_POST['precio'] == 0)
					$sql = "SELECT id, viaje, precio FROM combo ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
				else
					$sql = "SELECT id, viaje, precio FROM combo WHERE precio < ".$_POST['precio']. " ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
			}
			else
				$sql = "SELECT id, viaje, precio FROM combo";
			$busquedas = $conn->query($sql);
			$busquedas = $busquedas->fetch_all();
			$ncombos = count($busquedas);
			$combos = array();
			for ($i=0;$i<$ncombos;$i++){	
				$idcombo = $busquedas[$i][0];
				$idViaje = $busquedas[$i][1];
				$precio = $busquedas[$i][2];
				$sql = "SELECT titulo, descb FROM viaje WHERE id = '".$idViaje."'";
				$viaje = $conn->query($sql);
				$viaje = $viaje->fetch_assoc();
				$sql = "SELECT idact FROM intercombo WHERE idcombo = '".$idcombo."'";
				$idActividades = $conn->query($sql);
				$idActividades = $idActividades->fetch_all();
				$nactividades=count($idActividades);
				$actividades = array();
				for($j=0;$j<$nactividades;$j++){
					$sql= "SELECT titulo, descb FROM actividad WHERE id = '".$idActividades[$j][0]."'";
					$actividad = $conn->query($sql);
					$actividad = $actividad->fetch_assoc();
					$actividades[$j] = $actividad ;
				}
				$combos[$i]["ID"] = $idcombo;
				$combos[$i]["idViaje"] = $idViaje;
				$combos[$i]["VIAJE"] = $viaje ;
				$combos[$i]["PRECIO"] = $precio;
				$combos[$i]["ACTIVIDADES"] = $actividades;
			}
			return $combos;
		}

		public static function insertCombo(){

		}



	}

?>