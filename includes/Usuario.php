<?php
require("config.php");

class Usuario
{
    //variables de la clase
    private $Nick;
    private $Nombre;
    private $Apellidos;
    private $Password;
    private $Mail;
    private $Telefono;
    private $Tipo;
    private $Registrado;

    //constructora
    private function __construct($nick, $nombre, $apellidos, $password, $mail, $telefono, $tipo)
    {
        $this->Nick= $nick;
        $this->Nombre = $nombre;
        $this->Apellidos = $apellidos;
        $this->Password = $password;
        $this->Mail = $mail;
        $this->Telefono = $telefono;
        $this->Tipo = $tipo;
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

    public static function buscaUsuario($nick)
    {
        $app = Aplicacion::getSingleton();
        $conn = $app->conexionBd();
        $query = sprintf("SELECT * FROM USUARIO U WHERE U.NICK = '%s'", $conn->real_escape_string($nick));
        $rs = $conn->query($query);
        $result = false;
        if ($rs) {
            if ( $rs->num_rows == 1) {
                $fila = $rs->fetch_assoc();
                $user = new Usuario($fila['NICK'], $fila['NOMBRE'], $fila['APELLIDOS'], $fila['PASSWORD'], $fila['MAIL'], $fila['TELEFONO'], $fila['TIPO']);
                $user->Registrado = true;
                $result = $user;
            }
            $rs->free();
        } else {
            echo "Error al consultar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
            exit();
        }
        return $result;
    }
    
    public static function crea($nick, $nombre, $apellidos,$password, $rPassword, $mail, $telefono, $tipo)
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
        $query=sprintf("INSERT INTO USUARIO(NICK, NOMBRE, APELLIDOS, PASSWORD, MAIL, TELEFONO, TIPO) VALUES('%s', '%s', '%s', '%s', '%s', '%s', '%s')"
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
        $query=sprintf("UPDATE USUARIO U SET NOMBRE = '%s', APELLIDOS = '%s', PASSWORD = '%s', MAIL = '%s', TELEFONO = '%s', TIPO = '%s' WHERE U.NICK = %i"
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
