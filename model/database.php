<?php
    //Se definen los parámetros(ruta,contraseña,etc) usados para la conexión a la base de datos
    $dsn = 'mysql:host=localhost;dbname=world';
    $username = 'root';
    //$password = mipassword;

    //Se intenta realizar la conexión.
    try {
        $db = new PDO($dsn, $username);
        //En caso de que se tuviera contraseña
        //$db = new PDO($dsn, $username, $password)
    } catch (PDOException $e) {
        //Se muestra un mensaje de error
        $error_message = 'Error de la base de datos: ';
        //Se le concatena el mensaje de la excepción. Como la excepcion es de una clase se accede a su metodo getmensaje con '->'
        $error_message .= $e->getMessage();
        //Se muestra la plantilla de error
        include('view/error.php');
        //Finaliza el script
        exit();

    }

?>