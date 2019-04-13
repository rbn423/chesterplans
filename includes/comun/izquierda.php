<?php
	include (dirname(__DIR__)."/Ranking.php");
?>
<div id="izquierda">
	<?php 
		$ranking = new Ranking();
		echo $ranking::gestionar();
	?>
</div>