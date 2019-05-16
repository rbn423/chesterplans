<?php 
	include_once (dirname(__DIR__)."/Selector.php");
?>
<div id="derecha">
	<?php
		$selector = new Selector(); 
		$selector->genera($_SESSION['vista']);
	?>
</div>