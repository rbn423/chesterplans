<script>
	var URLactual = window.location;
	var stringUrl= String(URLactual);
	var url = stringUrl.split("/");
	if(url[url.length-1]=="vistaCrearDescuento.php"){
		$(document).ready(function() {
			$("#menuCrearDescuento").css({'background-color':'#D6CC07'});
		});
	}
	else if(url[url.length-1]=="vistaDescuentos.php"){
		$(document).ready(function() {
			$("#menuGestionarDescuentos").css({'background-color':'#D6CC07'});
		});
	}
	else if(url[url.length-1]=="vistaUsuarios.php"){
		$(document).ready(function() {
			$("#menuGestionarUsuarios").css({'background-color':'#D6CC07'});
		});
	}
</script>
<div id="menuadmin">
	<a href="vistaCrearDescuento.php">
		<span class="apartado" id="menuCrearDescuento">
			Crear Descuento
		</span>
	</a>	
	<a href="vistaDescuentos.php">
		<span class="apartado2" id="menuGestionarDescuentos">
			Gestionar Descuentos
		</span>
	</a>
	<a href="vistaUsuarios.php">
		<span class="ultimo" id="menuGestionarUsuarios">
			Gestionar Usuarios
		</span>
	</a>
</div>