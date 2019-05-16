<?php 
	require_once("config.php");

	class Selector{

		public static function genera($vista){
			switch($vista){
				case "viajes":
				echo <<<EOF
				<form method="post" action="buscador.php">
					<div id = "selector">
						<p>
							Buscar en: <select name="tema">
												<option value="todo">Todo</option>
												<option value="viajes">Viajes</option>
												<option value="actividades">Actividades</option>
												<option value="experiencias">Experiencias</option>
										<select>
						</p>
						<p><input type="textarea" name="buscar" placeholder="Buscador"</p>
						<p>
							<input type="submit" value="Enviar">
						</p>
					</div>
				</form>
				<form method="post" action="vistaViajes.php">
					<div id="selector">
						<p>
							Precio máximo: <select name="precio">
								<option value=0>-----</option>
								<option value=50>50 €</option>
								<option value=100>100 €</option>
								<option value=150>150 €</option>
								<option value=200>200 €</option>
								<option value=250>250 €</option>
								<option value=300>300 €</option>
								<option value=350>350 €</option>
								<option value=400>400 €</option>
								<option value=450>450 €</option>
								<option value=500>500 €</option>
								<option value=550>550 €</option>
								<option value=600>600 €</option>
								<option value=650>650 €</option>
								<option value=700>700 €</option>
								<option value=750>750 €</option>
								<option value=800>800 €</option>
								<option value=850>850 €</option>
								<option value=900>900 €</option>
								<option value=950>950 €</option>
								<option value=1000>1000 €</option>
							<select>
						</p>
						<fieldset id="filtrar">
						<legend>Filtrar por:</legend>
							<p><input type="radio" name="filtro" value="titulo" checked>Nombre</p>
							<p><input type="radio" name="filtro" value="fechaIni">Fecha de inicio</p>
							<p><input type="radio" name="filtro" value="fechaFin">Fecha de fin</p>
 							<p><input type="radio" name="filtro" value="precio">Precio</p>
						</fieldset>
						<fieldset id="ordenar">
						<legend>Ordenar por:</legend>
		 					<p><input type="radio" name="orden" value="desc" checked>Descendente</p>
		 					<p><input type="radio" name="orden" value="asc">Ascendente</p>
						</fieldset>
						<p>
							<input type="submit" value="Enviar">
						</p>
					</div>
				</form>
EOF;
break;
			case "experiencias":
			echo <<<EOF
			<form method="post" action="buscador.php">
				<div id = "selector">
					<p>
						Buscar en: <select name="tema">
											<option value="todo">Todo</option>
											<option value="viajes">Viajes</option>
											<option value="actividades">Actividades</option>
											<option value="experiencias">Experiencias</option>
									<select>
					</p>
					<p><input type="textarea" name="buscar" placeholder="Buscador"</p>
					<p>
						<input type="submit" value="Enviar">
					</p>
				</div>
			</form>
				<form method="post" action="vistaExperiencias.php">
					<div id="selector">
						<fieldset id="filtrar">
						<legend>Filtrar por:</legend>
							<p><input type="radio" name="filtro" value="titulo" checked>Título de la experiencia</p>
							<p><input type="radio" name="filtro" value="creador">Nick del creador</p>
							<p><input type="radio" name="filtro" value="likes">Me gustas</p>
		 				</fieldset>
						<fieldset id="ordenar">
						<legend>Ordenar por:</legend>
		 					<p><input type="radio" name="orden" value="desc" checked>Descendente</p>
		 					<p><input type="radio" name="orden" value="asc">Ascendente</p>
						</fieldset>
							<p>
								<input type="submit" value="Enviar">
							</p>
					</div>
				</form>
EOF;
break;
			case "actividades":
			echo <<<EOF
			<form method="post" action="buscador.php">
				<div id = "selector">
					<p>
						Buscar en: <select name="tema">
											<option value="todo">Todo</option>
											<option value="viajes">Viajes</option>
											<option value="actividades">Actividades</option>
											<option value="experiencias">Experiencias</option>
									<select>
					</p>
					<p><input type="textarea" name="buscar" placeholder="Buscador"</p>
					<p>
						<input type="submit" value="Enviar">
					</p>
				</div>
			</form>
				<form method="post" action="vistaActividades.php">
					<div id="selector">
						<p>
							Precio máximo: <select name="precio">
								<option value=0>-----</option>
								<option value=50>50 €</option>
								<option value=100>100 €</option>
								<option value=150>150 €</option>
								<option value=200>200 €</option>
								<option value=250>250 €</option>
								<option value=300>300 €</option>
								<option value=350>350 €</option>
								<option value=400>400 €</option>
								<option value=450>450 €</option>
								<option value=500>500 €</option>
								<option value=550>550 €</option>
								<option value=600>600 €</option>
								<option value=650>650 €</option>
								<option value=700>700 €</option>
								<option value=750>750 €</option>
								<option value=800>800 €</option>
								<option value=850>850 €</option>
								<option value=900>900 €</option>
								<option value=950>950 €</option>
								<option value=1000>1000 €</option>
							<select>
						</p>
						<fieldset id="filtrar">
						<legend>Filtrar por:</legend>
							<p><input type="radio" name="filtro" value="titulo" checked>Nombre</p>
							<p><input type="radio" name="filtro" value="fecha">Fecha de la actividad</p>
 							<p><input type="radio" name="filtro" value="precio">Precio</p>
						</fieldset>
						<fieldset id="ordenar">
						<legend>Ordenar por:</legend>
		 					<p><input type="radio" name="orden" value="desc" checked>Descendente</p>
		 					<p><input type="radio" name="orden" value="asc">Ascendente</p>
						</fieldset>
						<p>
							<input type="submit" value="Enviar">
						</p>
					</div>
				</form>
EOF;
break;
			case "combos":
			echo <<<EOF
			<form method="post" action="buscador.php">
				<div id = "selector">
					<p>
						Buscar en: <select name="tema">
											<option value="todo">Todo</option>
											<option value="viajes">Viajes</option>
											<option value="actividades">Actividades</option>
											<option value="experiencias">Experiencias</option>
									<select>
					</p>
					<p><input type="textarea" name="buscar" placeholder="Buscador"</p>
					<p>
						<input type="submit" value="Enviar">
					</p>
				</div>
			</form>
			<form method="post" action="vistaCombo.php">
					<div id="selector">
						<p>
							Precio máximo: <select name="precio">
								<option value=0>-----</option>
								<option value=50>50 €</option>
								<option value=100>100 €</option>
								<option value=150>150 €</option>
								<option value=200>200 €</option>
								<option value=250>250 €</option>
								<option value=300>300 €</option>
								<option value=350>350 €</option>
								<option value=400>400 €</option>
								<option value=450>450 €</option>
								<option value=500>500 €</option>
								<option value=550>550 €</option>
								<option value=600>600 €</option>
								<option value=650>650 €</option>
								<option value=700>700 €</option>
								<option value=750>750 €</option>
								<option value=800>800 €</option>
								<option value=850>850 €</option>
								<option value=900>900 €</option>
								<option value=950>950 €</option>
								<option value=1000>1000 €</option>
							<select>
						</p>
						<fieldset id="filtrar">
						<legend>Filtrar por:</legend>
							<p><input type="radio" name="filtro" value="NOMBREVIAJE" checked>Nombre del viaje</p>
 							<p><input type="radio" name="filtro" value="precio">Precio</p>
 						</fieldset>
						<fieldset id="ordenar">
						<legend>Ordenar por:</legend>
		 					<p><input type="radio" name="orden" value="desc" checked>Descendente</p>
		 					<p><input type="radio" name="orden" value="asc">Ascendente</p>
						</fieldset>
						<p>
							<input type="submit" value="Enviar">
						</p>
					</div>
				</form>
EOF;
break;
			default:
				echo "<div id=tituloEmpresa>";
				echo "<p>Bienvenido a Chesterplans</p>";
				echo "</div>";
				echo "<p>Aquí podrás disfrutar del mejor contenido para viajeros.</p>";
				echo "<p>Disponemos de las mejores ofertas para viajes y actividades, además de contenido compratido por nuestros usuarios en los que comparten sus experiencias.</p>";
				echo "<p>Date una vuelta y mira lo que te interese.</p>";
				echo "<p>Si eres una empresa también podrás publicar tus ofertas de viajes y actividades aquí.</p>";
			}
		}
	}
?>