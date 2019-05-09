<script>
	var URLactual = window.location;
	var stringUrl= String(URLactual);
	var url = stringUrl.split("/");
	if(url[url.length-1]=="vistaCrearActividad.php"){
		$(document).ready(function() {
			$("#menuCrearActividad").css({'background-color':'#B829BF'});
		});
	}
	else if(url[url.length-1]=="vistaCrearViaje.php"){
		$(document).ready(function() {
			$("#menuCrearViaje").css({'background-color':'#B829BF'});
		});
	}
	else if(url[url.length-1]=="vistaCrearCombo.php"){
		$(document).ready(function() {
			$("#menuCrearCombo").css({'background-color':'#B829BF'});
		});
	}
	else if(url[url.length-1]=="vistaHistorial.php"){
		$(document).ready(function() {
			$("#menuHistorialEmp").css({'background-color':'#B829BF'});
		});
	}
</script>
<div id="menuempresa">
	<a href="vistaCrearActividad.php">
		<span class="apartado" id="menuCrearActividad">
			Crear Actividad
		</span>
	</a>
	<a href="vistaCrearViaje.php">
		<span class="apartado" id="menuCrearViaje">
			Crear Viaje
		</span>
	</a>
	<a href="vistaCrearCombo.php">
		<span class="apartado" id="menuCrearCombo">
			Crear Combo
		</span>
	</a>
	<a href="">
		<span class="ultimo" id="menuHistorialEmp">
			Historial
		</span>
	</a>
</div>