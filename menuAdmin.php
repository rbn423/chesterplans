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
	<a href="vistaCrearDescuento.php">
		<span class="apartado" id="menuCrearDescuento">
			Crear Descuento
		</span>
	</a>	
	<a href="vistaDescuentos.php">
		<span class="apartado" id="menuGestionarDescuentos">
			Gestionar Descuentos
		</span>
	</a>
	<a href="vistaUsuarios.php">
		<span class="apartado" id="menuGestionarUsuarios">
			Gestionar Usuarios
		</span>
	</a>
</div>