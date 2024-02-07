<?php
class Conexion{
    //variables de entorno//protegen los datos(credenciales) de conexion
    private $HOST = "127.0.0.1";
    private $USER = "unicuc";
    private $PWD = "1234";
    private $DB = "cursocuc";

    function __construct(){}//constructor, generalmente llevan el nombre de la clase, en php aparentemente no//investiga mas

    function crearConexion(){
        //usa las variables de entorno para establecer la conexion
        //se establece la conexion a la bd; host, user, password, bd en ese orden en especifico
        $mysqli = new mysqli($this->HOST, $this->USER, $this->PWD, $this->DB);
        if ($mysqli->connect_errno) {// corrobora si hubo algun error al intentar establecer la conexion
            return null;//devuelve un valor nulo que sera utilizado mas adelante
        }
        return $mysqli;
    }

}
?>