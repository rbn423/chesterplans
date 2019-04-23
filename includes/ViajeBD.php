<?php
require("config.php");

class ViajeBD
{
    //variables de la clase
    private $Id;
    private $Titulo;
    private $Descb;
    private $Descg;
    private $Foto;
    private $Comentario;
    private $Creador;
    private $FechaIni;
	private $FechaFin;
	private $Precio;
	
	public static function getConn() {
		//$app = Aplicacion::getSingleton();
		$conn = $app->conexionBd();
		
	}

    public static function listaViajes() {
		self::getConn();
		if($_POST){
			if ($_POST['precio'] == 0)
				$sql = "SELECT id FROM viaje ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
			else
				$sql = "SELECT id FROM viaje WHERE precio < ".$_POST['precio']. " ORDER BY ".$_POST['filtro']." ".$_POST['orden'];
		}
		else
			$sql = "SELECT id FROM viaje";
    }

    //Inicia el login
    public static function login($nick, $password)
    {
        $user = self::buscaUsuario($nick);
        if ($user && $user->compruebaPassword($password)) {
            return $user;
        }
        return false;
    }
    
    public static function crea($Id, $Titulo, $Descb,$Descg,$Foto,$Comentario,$Creador,$FechaIni,$FechaFin,$Precio)
    {
        if ($nick != "" && $nombre != "" && $apellidos != "" && $password != "" && $rPassword != "" && $mail != "" && $telefono != ""){
            $user = self::buscaUsuario($nick);
            if ($user) {
                echo '<p>Ese nick ya esta utilizado</p>';
                return false;
            }
            if (self::comparaPassword($password,$rPassword)){
                $user = new Usuario($nick, $nombre, $apellidos, self::hashPassword($password), $mail, $telefono, $tipo);
                return self::guarda($user);
            }
        }
        else{
            echo '<p> Has dejado vacío algunos campos del formulario </p>';
        }
        return false;
    }

    public static function comparaPassword($password, $rPassword){
        if($password == $rPassword){
            return true;
        }
        else{
            echo '<p> Las contraseñas no coinciden</p>';
            return false;
        }
    }
    
    private static function hashPassword($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
    
    public static function guarda($usuario)
    {
        if ($usuario->Registrado !== null) {
            return self::actualiza($usuario);
        }
        return self::inserta($usuario);
    }
    
    private static function inserta($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("INSERT INTO usuario(NICK, NOMBRE, APELLIDOS, PASSWORD, MAIL, TELEFONO, TIPO) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s')"
            , $conn->real_escape_string($usuario->Nick)
            , $conn->real_escape_string($usuario->Nombre)
            , $conn->real_escape_string($usuario->Apellidos)
            , $conn->real_escape_string($usuario->Password)
            , $conn->real_escape_string($usuario->Mail)
            , $conn->real_escape_string($usuario->Telefono)
            , $conn->real_escape_string($usuario->Tipo));
        if (! $conn->query($query) ) {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $usuario;
    }
    
    private static function actualiza($usuario)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query=sprintf("UPDATE usuario U SET NOMBRE = '%s', APELLIDOS = '%s', PASSWORD = '%s', MAIL = '%s', TELEFONO = '%s', TIPO = '%s' WHERE U.NICK = %i"
            , $conn->real_escape_string($usuario->Nombre)
            , $conn->real_escape_string($usuario->Apellidos)
            , $conn->real_escape_string($usuario->Password)
            , $conn->real_escape_string($usuario->Mail)
            , $conn->real_escape_string($usuario->Telefono)
            , $conn->real_escape_string($usuario->Tipo)
            , $usuario->Nick);
        if ( $conn->query($query) ) {
            if ( $conn->affected_rows != 1) {
                echo "No se ha podido actualizar el usuario: " . $usuario->Nick;
                exit();
            }
        } else {
            echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $usuario;
    }
    
    public function nick()
    {
        return $this->Nick;
    }

    public function nombre()
    {
        return $this->Nombre;
    }

    public function apellidos()
    {
        return $this->Apellidos;
    }

    public function mail(){
        return $this->Mail;
    }

    public function telefono(){
        return $this->Telefono;
    }

    public function tipo(){
        return $this->Tipo;
    }

    public function compruebaPassword($password)
    {
        return password_verify($password, $this->Password);
    }

    public function cambiaPassword($nuevoPassword)
    {
        $this->password = self::hashPassword($nuevoPassword);
    }
}
