<?php
  $opc = $_GET['opc'];//generalmente se recomienda usar mejor el metodo POST para mas privacidad/seguridad de los datos; peor por ahora se usa el metodo GET por asuntos tenicos favorables a la explicacion

  //GET //manda los datos por url
  //POST//manda los datos ocultos

  /*La diferencia principal entre los métodos GET y POST en HTTP radica en cómo transmiten los datos: GET envía datos a través de la URL, visible en la barra de direcciones del navegador, mientras que POST envía datos de forma más segura en el cuerpo de la solicitud, lo que es invisible para el usuario.*/

switch ($opc) {
    case 1:
        # Registrar comentarios de clienes
       //recibe los valores enviados por la url desde el formulario de contactos
        $nombre = $_POST['txtNombre'];r
        $email  = $_POST['txtEmail'];
        $tel    = $_POST['txtTelefono'];
        $coment = $_POST['txtComentarios'];
        //REGISTRAR LOS VALORES EN LA BASE DE DATOS
        break;
    #bd- base de datos- conjunto de datos almacenados bajo un contexto

    case 2:
//se establece la conexion a la bd; host, user, password, bd
        $mysqli = new mysqli("127.0.0.1", "unicuc", "1234", "cursocuc");

        if ($mysqli->connect_errno) {// corrobora si hubo algun error al intentar establecer la conexion
            echo "Falló la conexión: " . $mysqli->connect_error;//notifica que hubo un error y cual error fue aparentemente
        }
        //una vez se establece la conexion, se obtienen los datos de una tabla: tblcomentarios
        $getComents = $mysqli->query("SELECT * FROM tblcomentarios");

//se corrobora la existencia de los datos
if ($getComents) {
    //se imprimen todos los registros encontrados
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

        break;
    default:
        # code...
        
        break;
}

//----------------------------------------------------------------------------------------
//ver la pagina del profe
    //http://192.168.100.232:8080/curso/   ip variable


    //Un usuario se crea con el superusuario root; fuera de cualquier base de datos
    //A un usuario creado se le otorgan permisos; fuera de cualquier base de datos

//ver usuarios existentes con un(solo se puede con un superusuario(root))
//ver los usuarios existentes en MySQL
//SELECT user, host FROM mysql.user;
/*Esta consulta selecciona los nombres de usuario (user) y los hosts desde la tabla mysql.user. Los resultados mostrarán todos los usuarios junto con sus hosts asociados. */

/*host:  % --todos los origenes(todas las ip)
         localhost  --el origen local(ip local)
*/


//crear un usuario
//CREATE USER 'alumno'@'host' IDENTIFIED BY '1234';

//Otorgar permiso completo a la bd
//GRANT ALL PRIVILEGES ON nombre_de_la_bd.* TO 'alumno'@'host';

//si solo quieres otorgar permisos de lectura y escritura, puedes utilizar:
//GRANT SELECT, INSERT, UPDATE, DELETE ON nombre_de_la_bd.* TO 'alumno'@'host';
//Después de otorgar los permisos, asegúrate de ejecutar el comando FLUSH PRIVILEGES; para que los cambios tengan efecto inmediato.

//cambiar contraseña de un usuario desde el usuario root
// SET PASSWORD FOR 'unicuc'@'host' = PASSWORD('nuevacontraseña');

//borrar user 
//DROP USER 'alumno'@'host';
//FLUSH PRIVILEGES;

//super usuario
//GRANT ALL PRIVILEGES ON *.* TO 'alumno'@'host';

//---------------------------------------------------------
//crear un usuario generico para conectarse desde cualquier maquina//permitir accesos externos
//que tenga permisos para una bd  y que el servidor MySQL esté configurado para aceptar conexiones remotas.

//crear usuario
//CREATE USER 'alumno'@'%' IDENTIFIED BY '1234';

//otorgar privilegios a una bd, en este caso cursocuc//ambos comandos deberia funcionar correctamente
//GRANT ALL PRIVILEGES ON cursocuc.* TO 'alumno'@'%';
//grant all on cursocuc.* to 'alumno'@'%';

//aplicar cambios
//FLUSH PRIVILEGES;

/*
Configurar el servidor MySQL para aceptar conexiones remotas:

Abre el archivo de configuración de MySQL (generalmente llamado my.cnf o my.ini) con un editor de texto.

Busca la línea que comienza con bind-address. Si está configurada para 127.0.0.1 (localhost), 
cámbiala a 0.0.0.0 o coméntala para permitir conexiones desde cualquier IP. 
Esto variará según tu entorno y configuración específica.

Guarda y cierra el archivo.
Reinicia el servidor MySQL para aplicar los cambios.
*/


//sirve para conectarse a una bd de alguien mas que creo este usuario
//mysql -h 192.168.100.232 -u alumno -p
//1234

//------------------------------------------

//ver databases
//show databases;

//crear database
//create database nombrebd

//moverse a/ entrar en/ base de datos
//use nombrebd

//ver tablas
//show tables;

//crear tablas//ejemplo
/*create table tblUsuarios(
    iduser int primary key auto_increment,
    username varchar(20),
    password varchar(32)
    );
*/
//---------------------------------------------------------------

//ingresar datos a tabla
//insert into tblcomentarios(nombre,email,telefono,comentario) values ("ruben", "iscorrect@gmail.com","4612345656","hola, no sde que decir")

//ver todos los datos en tabla
//SELECT * FROM tblUsuarios;

//ver solo algunas columnas
//SELECT nombre,telefono FROM tblcomentarios;

//ver solo una columna
//SELECT nombre FROM tblcomentarios;

//ver con filtro
//SELECT nombre FROM tblcomentarios WHERE idComentario=2;

//actualiza datos
//UPDATE tblcomentarios SET nombre = 'nuevo_nombre' WHERE idComentario = 2;


//DELETE//borrar datos de las tablas//registros
//eliminar una fila específica de la tabla tblcomentarios
//DELETE FROM tblcomentarios WHERE idComentario = 2;

//Si deseas eliminar todas las filas de la tabla tblcomentarios, puedes omitir la cláusula WHERE:
//DELETE FROM tblcomentarios;

//---------------------------------------------------------


//ELIMINAR UNA TABLA
//DROP TABLE nombre_de_la_tabla;

//ELIMINAR UNA BASE DE DATOS
//DROP DATABASE nombre_de_la_base_de_datos;

//---------------------------------------------------------

//Copias de seguridad de tablas dentro de la misma bd

//Esto creará una nueva tabla llamada nombre_nueva_tabla con la misma estructura y datos que la nombre_tabla_original.
//CREATE TABLE nombre_nueva_tabla AS SELECT * FROM nombre_tabla_original;

//Esto creará una nueva tabla vacía (nombre_nueva_tabla) con la misma estructura que nombre_tabla_original, pero sin datos.
//CREATE TABLE nombre_nueva_tabla AS SELECT * FROM nombre_tabla_original WHERE 1=0;

//________________________________________________________

//respaldar bd completa
//mysqldump -u tu_usuario -p tu_base_de_datos > backup.sql   hace la copia de seguridad
//mysql -u tu_usuario -p tu_base_de_datos < backup.sql   restaura la bd desde la copia

//en Windows
//mysqldump -u tu_usuario -p --databases tu_base_de_datos > C:\ruta\hacia\backup.sql     hace la copia de seguridad
//mysql -u tu_usuario -p < C:\ruta\hacia\backup.sql       restaura la bd desde la copia

//recomendable crear variable de entorno PATH // en general es mejor crear variables de entorno al manejar bd por temas de seguridad
//las copias de seguridad son manuales, por ende al no ser automaticas se recomienda hacerlas regularmente
//puedes ajustar el nombre del archivo al que desees; no la extension

//--------------------------------------------------------
?>

