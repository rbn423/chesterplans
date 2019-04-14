<?php 
	require("includes/Form.php");
	require("includes/Usuario.php");

	class FormularioRegistro extends Form{

		private $option = array();


		public function __construct(){
			$this->option['action'] = "registro.php";
			parent::__construct("form-registro", $this->option);
		}

		protected function generaCamposFormulario($datosIniciales){
			$html= <<<EOF
			<div id="registro">
				<h1>Registro de Usuario</h1>
				<p>
					Nick de usuario:
					<input type="text" name="usernombre"/>
				</p>
				<p>
					Nombre: 
					<input type="text" name="nombre"/>
				</p>
				<p>
					Apellidos: 
					<input type="text" name="apellidos"/>
				</p>
				<p>
					Contraseña: 
					<input type="password" name="contraseña"/>
				</p>
				<p>
					Introduzca la contraseña de nuevo: 
					<input type="password" name="rcontraseña"/>
				</p>
				<p>
					Email: 
					<input type="text" name="email"/>
				</p>
				<p>
					Teléfono: 
					<input type="text" name="telefono"/>
				</p>
				<p>
					Tipo de cuenta: <select name="tipo">
						<option value="basico">Básico</option>
						<option value="empresa">Empresa</option>
					<select>
				</p>
				<p>
					<input type="submit" value="Enviar">
				</p>
			</div>
EOF;
			return $html;
		}

		protected function procesaFormulario($datos){
    		$resultado = array();
			
			$nick = htmlspecialchars(trim(strip_tags($datos["usernombre"])));
			$nombre = htmlspecialchars(trim(strip_tags($datos["nombre"])));
			$apellidos = htmlspecialchars(trim(strip_tags($datos["apellidos"])));
			$contraseña = htmlspecialchars(trim(strip_tags($datos["contraseña"])));
			$rcontraseña = htmlspecialchars(trim(strip_tags($datos["rcontraseña"])));
			$email = htmlspecialchars(trim(strip_tags($datos["email"])));
			$telefono = htmlspecialchars(trim(strip_tags($datos["telefono"])));
			$tipo = htmlspecialchars(trim(strip_tags($datos["tipo"])));

			$user = Usuario::crea($nick, $nombre, $apellidos, $contraseña, $rcontraseña, $email, $telefono, $tipo );
			if ($user){
				$_SESSION["nombre"]=$user->nombre();
				$_SESSION["login"]=true;
				$_SESSION["nick"]=$user->nick();
				$_SESSION["apellidos"]=$user->apellidos();
				$_SESSION["mail"]=$user->mail();
				$_SESSION["telefono"]=$user->telefono();
				$_SESSION["tipo"]=$user->tipo();
				$resultado = 'index.php';
			}

			return $resultado;
		}
	}
?>	