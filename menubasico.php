<script>
	var URLactual = window.location;
	var stringUrl= String(URLactual);
	var url = stringUrl.split("/");
	if(url[url.length-1]=="vistaExperienciasCompartidas.php"){
		$(document).ready(function() {
			$("#menuEsperienciasCreadas").css({'background-color':'#CA4E07'});
		});
	}
	else if(url[url.length-1]=="vistaCrearViaje.php"){
		$(document).ready(function() {
			$("#menuPuntos").css({'background-color':'#B829BF'});
		});
	}
	else if(url[url.length-1]=="vistaCrearExperiencia.php"){
		$(document).ready(function() {
			$("#menuCrearExperiencia").css({'background-color':'#CA4E07'});
		});
	}
	else if(url[url.length-1]=="vistaHistorial.php"){
		$(document).ready(function() {
			$("#menuInteresesGuardados").css({'background-color':'#B829BF'});
		});
	}
	else if(url[url.length-1]=="vistaHistorial.php"){
		$(document).ready(function() {
			$("#menuHistorialBas").css({'background-color':'#B829BF'});
		});
	}
</script>
<div id="menubasico">
	<a href="vistaExperienciasCompartidas.php">
		<div class="apartado" id="menuEsperienciasCreadas">
			Exp.compartida
		</div>
	</a>
	<a href="">
		<div class="apartado" id="menuPuntos">
			Puntos
		</div>
	</a>
	<a href="vistaCrearExperiencia.php">
		<div class="apartado" id="menuCrearExperiencia">
			Crear Experiencia
		</div>
	</a>
	<a href="vistaIntereses.php">
		<div class="apartado" id="menuInteresesGuardados">
			Intereses guardados
		</div>
	</a>
	<a href="vistaCompras.php">
		<div class="ultimo" id="menuHistorialBas">
			Compras
		</div>
	</a>
</div>