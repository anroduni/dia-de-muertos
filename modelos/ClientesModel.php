<?php
class ClientesModel{
//una clase tiene propiedades y comportamiento

    //EL CONSTRUCTOR SIRVE PARA CREAR EL OBJETO/INSTANCIA DE A CLASE
    //DEPENDIENDO DEL LENGUAJE PUEDE O NO SER NECESARIO COLOCAR EL CONSTRICTOR//INVESTIGA SEGUN SEA PERTNIENETE
    function _construct(){}
   //los parametros son los vaslores enviados en una funcion. dentro del los parametros
    function INSERT(){}
    function UPDATE(){}
    function DELETE(){}
    function SELECT(){
        $conexion=new Conexion();
        $mysqli=$conexion->crearConexion();
        if ($mysqli !== null) {
             //una vez se establece la conexion, se obtienen los datos de una tabla: tblcomentarios
          $getComents = $mysqli->query("SELECT * FROM tblcomentarios");

          //se corrobora la existencia de los datos
       /*   if ($getComents) {
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
    }else{
         echo "Falló la conexión: " . $mysqli->connect_error;//notifica que hubo un error y cual error fue aparentemente
    
        }*/
   
     }
     
     echo $mysqli->host_info, "\n"; //?imprimir info de conexion mas salto de linea
      //?mas adelante se verificara el envio/muestra de errores 
      //?al usuario al comunicar esta variable y opciones/eventos de error o informacion 
      //?entre archivos para mandar a la interfaz 
     $mysqli->close(); //?cerrar conexion  

      return $getComents;
      
      
}
}
?>