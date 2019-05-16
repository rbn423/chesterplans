<?php
	require("includes/config.php");
	require_once("includes/DescuentoBD.php");

	$nombre=$_POST["nombre"];
	$porcentaje=$_POST["porcentaje"];
	$tipo=$_POST["tipo"];
	$precio=$_POST["precio"];

	function mostrarCreado($nombre, $porcentaje, $tipo, $precio){
		if ($nombre!=NULL && $porcentaje!=NULL && $tipo!=NULL && $precio!=NULL){
			if (!is_numeric($porcentaje))
				echo "El porcentaje que has introducido no es un valor numérico.";
			elseif (!is_numeric($precio))
				echo "El valor de puntos necesarios para el descuento no es numérico.";
			elseif ($porcentaje > 100)
				echo "No puedes introducir un descuento mayor del 100%.";
			elseif ($porcentaje <= 0)
				echo "No puedes introducir este valor en el descuento.";
			else{
				$f=getdate()[0];
				$id=$nombre.$f;
				DescuentoBD::insertaDescuento($nombre, $porcentaje, $tipo, $precio, $id);
				echo "Acabas de crear un descuento.";
			}
		}
		else
			echo "El descuento no se ha creado porque alguno de los campos estaba vacio.";
	}
		
?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Descuento Creado </title>
	</head>
	<body>

		<?php
			require('includes/comun/cabecera.php');
			require('includes/comun/menu.php');
			require('includes/comun/izquierda.php');
		?>
		<div id="contenido">
			<?php
				require('menuadmin.php');
				mostrarCreado($nombre, $porcentaje, $tipo, $precio);
			?>		
		</div>			
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>