<?php
	require_once(dirname(__DIR__)."/Ranking.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script>
	$(document).ready(function() {
		$("#izquierda").mouseenter(function(){
			alert("Este es un ranking en el que podemos observar a los usuarios cuyo contenido es el mejor puntuado de la pagina");
		});
	})
</script>
<div id="izquierda">
	<?php 
		echo Ranking::mostrarGeneral();
	?>
</div>