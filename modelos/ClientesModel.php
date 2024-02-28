<?php
class ClientesModel
{
    //una clase tiene propiedades y comportamiento

    //EL CONSTRUCTOR SIRVE PARA CREAR EL OBJETO/INSTANCIA DE LA CLASE
    //DEPENDIENDO DEL LENGUAJE PUEDE O NO SER NECESARIO COLOCAR EL CONSTRUCTOR//INVESTIGA SEGUN SEA PERTINENTE
    function _construct()
    {
    }
    //los parametros son los vaslores enviados en una funcion. dentro del los parametros
    function INSERT($nombre, $email, $telefono, $comentario)
    { //recibe las variables
        $conexion = new Conexion(); //esctablece la conexxion de sql
        $mysqli = $conexion->crearConexion();

        $sql = "INSERT INTO tblcomentarios (nombre, email, telefono, comentario) 
        VALUES ('$nombre', '$email', '$telefono', '$comentario')";
        //comando insert bd

        /*
            $sql = "INSERT INTO tblcomentarios (nombre, email, telefono, comentarios) //?Funcion insert con datos resultantes de concatenacion
            VALUES ('" . $nombre . "', '" . $email . "', '" . $telefono . "', '" . $comentario . "')";
            //?es decir la variable se concatena(une), con otro valor("') a travez del punto
        */

        if ($mysqli->query($sql) == TRUE) { //comprueba el resultado; estado del mismo:¿salio bien o mal?

            return "Registro insertado"; //. $mysqli->host_info . "\n"; //informa del resultado correcto esperado

        } else {
            return "Ocurrió un error al insertar: " . $mysqli->error . "\n"; //informa del error encontrado
        }
        $mysqli->close(); //?cerrar conexion  
    }


    function UPDATE($idComentario, $nombre, $email, $telefono, $comentario)
    {
        $conexion = new Conexion(); //se establece conezion a bd, mysql
        $mysqli = $conexion->crearConexion();

        $sql = "UPDATE tblcomentarios 
        SET nombre='$nombre', email='$email', telefono='$telefono', comentario='$comentario' 
        WHERE idComentario = $idComentario";
        //consulta/comando, de mysql para actualizacion de datos de registros en tablas de bd

        if ($mysqli->query($sql) == TRUE) { //comprueba el resultado; estado del mismo:¿salio bien o mal?

            return "Se actualizo correctamente el registro"; //informa del resultado correcto esperado

        } else {
            return "Ocurrió un error al actualizar: --" . $mysqli->error . "\n"; //informa del error encontrado
        }
        $mysqli->close(); //?cerrar conexion  

    }


    function DELETE($idComentario)
    {
        $conexion = new Conexion(); //se establece conezion a bd, mysql
        $mysqli = $conexion->crearConexion();
        $sql = "DELETE FROM tblcomentarios WHERE idComentario = $idComentario";

        if ($mysqli->query($sql) == TRUE) { //comprueba el resultado; estado del mismo:¿salio bien o mal?

            return "Eliminacion/borrado Exitoso" . $mysqli->host_info . "\n"; //informa del resultado correcto esperado

        } else {
            return "Ocurrió un error al borrar/eliminar el registro: " . $mysqli->errno . "\n"; //informa del error encontrado
        }
        $mysqli->close(); //?cerrar conexion  
    }


    function SELECT()
    {
        $conexion = new Conexion();
        $mysqli = $conexion->crearConexion();
        if ($mysqli !== null) {
            //una vez se establece la conexion, se obtienen los datos de una tabla: tblcomentarios
            $getComents = $mysqli->query("SELECT * FROM tblcomentarios");
         
             /* 
                 //!el codigo sig, fue cambiado a otro lugar para mejorar el programa, la legibilidad, asi como la ejecucion en si de la pagina
                //?se corrobora la existencia de los datos
              
                if ($getComents) {
                    //?se imprimen todos los registros encontrados
                    while ($fila = $getComents->fetch_assoc()) {
                        echo $fila["nombre"], "<br>";//br es el salto de linea de html//php permite otros lenguajes bajo cierta sintaxis
                        echo $fila["email"], "<br>";
                        echo $fila["telefono"], "<br>";
                        echo $fila["comentario"], "<br>";
                    }
                } else {
                    echo "Error al ejecutar la consulta: " . $mysqli->error;//imprimir mensaje de error y el error que hubo en la conexion al ejecutar la consulta
                }
                echo $mysqli->host_info, "\n"; //imprimir info de conexion mas salto de linea
                $mysqli->close(); //cerrar conexion
                }else{
                echo "Falló la conexión: " . $mysqli->connect_error;//notifica que hubo un error y cual error fue aparentemente
                }
            */
        }else{
            echo "Falló la conexión: " . $mysqli;//notifica que hubo un error y cual error fue aparentemente
            }

        echo $mysqli->host_info, "\n"; //?imprimir info de conexion mas salto de linea
        //?mas adelante, se verificara el envio/muestra de errores 
        //?al usuario, al comunicar esta variable y opciones/eventos de error o informacion, 
        //?entre archivos, para mandar a la interfaz 
        $mysqli->close(); //?cerrar conexion  

        return $getComents;
    }
}
