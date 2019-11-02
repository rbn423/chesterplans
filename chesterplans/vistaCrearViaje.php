<?php
	require_once("includes/config.php");

	function mostrarCrear(){
		echo '<form method="post" action="viajeCreado.php" enctype="multipart/form-data">';
			echo'<div id="escribirViaje">'; 
			echo'<h3>Título:</h3>';
			echo'<p><input type="text" name="titulo"/></p>';
			echo'<h3>Fecha Inicio:</h3>';
			echo'<p><input type="date" name="fechaIni" id="date"/></textarea>';
			echo'<img src="imagenes/no.png" id="nodate"> <img src="imagenes/ok.png" id="sidate"></p>';
			echo'<h3>Fecha Fin:</h3>';
			echo'<p><input type="date" name="fechaFin"/></p>';
			echo'<h3>Descripción breve:</h3>';
			echo'<p><input type="text" name="descb" size="50"/></p>';
			echo'<h3>Texto:</h3>';
			echo'<p><textarea rows="10" cols="60" name="descg"></textarea></p>';
			echo'<p>Imagenes:</p>';
			echo'<p><input type="file" name="imagen" id="imagen"/></p>';
			echo'<h3>Precio:</h3>';
			echo'<p><textarea rows="1" cols="5" name="precio" id="price"/></textarea>';
			echo'<img src="imagenes/no.png" id="noprecio"> <img src="imagenes/ok.png" id="siprecio"></p>';
			echo'<p><input type="submit" value="Compartir"/></p>';
		echo'</div>';
	echo'</form>';
	}
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script>
			
			window.onload = function(){
				$("#noprecio").hide();
				$("#siprecio").hide();
				$("#sidate").hide();
				$("#nodate").hide();

			};
			
			function fechaValida(data, status){

				if(data == "mal"){
					$("#nodate").show();
					$("#sidate").hide();
				}
				else if (data == "bien"){
					$("#nodate").hide();
					$("#sidate").show();
				}
			}		
			function precioValido(data, status){
				
				if(data == "mal"){
					$("#noprecio").show();
					$("#siprecio").hide();
				}
				else if (data == "bien"){
					$("#noprecio").hide();
					$("#siprecio").show();
				}
			}			
			
			$(this).change(function(){
				var url="comprobarPrecio.php?precio="+ $("#price").val();
				$.get(url,precioValido);
			});

			$(this).change(function(){
				var url="comprobarFecha.php?fecha="+ $("#date").val();
				$.get(url,fechaValida);
			});
		</script>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Crear Viaje </title>
	</head>
	<body>

		<?php
			$_SESSION["vista"] = "crearViaje";
			require_once("includes/comun/cabecera.php");
			require_once("includes/comun/menu.php");
			require_once("includes/comun/izquierda.php");
		?>
			<div id="contenido">
				<?php
					require_once('menuempresa.php');
					mostrarCrear();
				?>
			</div>
		<?php
			require_once("includes/comun/derecha.php");
			require_once("includes/comun/pie.php");
		?>
		
	
	</body>

</html>