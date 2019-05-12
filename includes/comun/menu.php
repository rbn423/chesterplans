<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>	
	var URLactual = window.location;
	var stringUrl= String(URLactual);
	var url = stringUrl.split("/");
	if(url[url.length-1]=="index.php"){
		$(document).ready(function() {
			$("#inicio").css({'background-color':'#17B56F'});
		});
	}
	else if(url[url.length-1]=="vistaViajes.php"){
		$(document).ready(function() {
			$("#menuviajes").css({'background-color':'#17B56F'});
		});
	}
	else if(url[url.length-1]=="vistaActividades.php"){
		$(document).ready(function() {
			$("#menuactividades").css({'background-color':'#17B56F'});
		});
	}
	else if(url[url.length-1]=="vistaExperiencias.php"){
		$(document).ready(function() {
			$("#menuexperiencias").css({'background-color':'#17B56F'});
		});
	}
	else if(url[url.length-1]=="vistaCombo.php"){
		$(document).ready(function() {
			$("#menucombo").css({'background-color':'#17B56F'});
		});
	}
</script>
<div id="menu">
	<a href="index.php">
		<div class="apartado" id="inicio">
			Inicio
		</div>
	</a>
	<a href="vistaViajes.php">
		<div class="apartado" id="menuviajes">
			Viajes
		</div>
	</a>
	<a href="vistaActividades.php">
		<div class="apartado" id="menuactividades">
			Actividades
		</div>
	</a>
	<a href="vistaExperiencias.php">
		<div class="apartado" id="menuexperiencias">
			Experiencias
		</div>
	</a>
	<a href="vistaCombo.php">
		<div class="ultimo" id="menucombo">
			Combo
		</div>
	</a>
</div>