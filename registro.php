<?php
	require("includes/config.php");
	require("FormularioRegistro.php");
?>
<html>
	<head>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
		<script>
			window.onload = function(){
				$("#nouser").hide();
				$("#siuser").hide();
			};
			
			function usuarioExiste(data, status){
				if(data == "existe"){
					$("#nouser").show();
					$("#siuser").hide();
				}
				else if (data == "disponible"){
					$("#nouser").hide();
					$("#siuser").show();
				}
				else if (data == "vacio"){
					$("#nouser").hide();
					$("#siuser").hide();
				}
			}			
			
			$(this).change(function(){
				var url="comprobarUsuario.php?user="+ $("#username").val();
				$.get(url,usuarioExiste);
			});
			
			
		</script>
		<link rel="stylesheet" type="text/css" href="css/estilo.css" />
		<title> Inicio </title>
	</head>
	<body>

		<?php
			require('includes/comun/cabecera.php');
			require('includes/comun/menu.php');
			require('includes/comun/izquierda.php');
		?>
			<div id="contenido">
				<?php
					$form = new FormularioRegistro();
					$form->gestiona();
				?>
			</div>
		<?php
			require('includes/comun/derecha.php');
			require('includes/comun/pie.php');
		?>
		
	
	</body>

</html>