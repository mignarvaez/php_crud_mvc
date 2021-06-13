<?php
    // Se importa la conexión a la base de datos y el archivo que interaccion con la tabla de ciudades de la base de datos
    require('model/database.php');
    require('model/ciudad_db.php');

    //Se leen los valores de variables externas para las operaciones CRUD
    $id = filter_input(INPUT_POST,'id',FILTER_VALIDATE_INT);
   
    $codigopais = filter_input(INPUT_POST,'codigopais',FILTER_SANITIZE_STRING);
    $distrito = filter_input(INPUT_POST,'distrito',FILTER_SANITIZE_STRING);
    $poblacion = filter_input(INPUT_POST,'poblacion',FILTER_SANITIZE_STRING);
    //accion que permite en rutar las peticiones con base en la misma
    $accion = filter_input(INPUT_POST, 'accion', FILTER_SANITIZE_STRING);
    
    //Si la acción enviada como POST es nula(no existe) o es falsa se pregunta si ha sido enviada como GET
    if(!$accion){
        $accion = filter_input(INPUT_GET, 'accion', FILTER_SANITIZE_STRING);
        //Si está acción es nuevamente nula o falsa se asigna un valor por defecto, que es la creación de un formulario de lectura vacio
        if(!$accion){
            $accion = 'formulario_crear_leer';
        }
    }

    //Si la ciudad enviada como POST es nula(no existe) o es falsa se pregunta si ha sido enviada como GET
    $ciudad = filter_input(INPUT_POST,'ciudad',FILTER_SANITIZE_STRING);
    if(!$ciudad){
        $ciudad = filter_input(INPUT_GET,'ciudad',FILTER_SANITIZE_STRING);
        //Si la ciudad es nuevamente nula o falsa se mostrar un error
    }

    //Dependiendo de la acción, y usando switch, se ejecutaran las diversas acciones
    switch ($accion) {
        case 'seleccionar':
            //Si existe una ciudad
            if($ciudad){
                //Se llama a la función correspondiente
                $resultados = seleccionar_ciudad_por_nombre($ciudad);
                //Se visualiza la información en el formaluario de actualizar/eliminar
                include('view/formulario_actualizar_eliminar.php');
            } else {
                //Se crea un mensaje de error
                $error_message = 'Información de ciudad no válida. Revisa los campos';
                include('view/error.php');
            }
            break;
        case 'insertar':
            //Se verifican que todos los campos existan
            if ($ciudad && $codigopais && $distrito && $poblacion) {
                //Se llama a la función para insertar una nueva ciudad
                $count = insertar_ciudad($ciudad, $codigopais, $distrito, $poblacion);
                //Se realiza una redireccion al index o root de la pagina pasando la accion select con los datos
                header("Location: .?accion=seleccionar&ciudad={$ciudad}&creado={$count}");
            } else {
                //Se crea un mensaje de error
                $error_message = 'Información de ciudad no válida. Revisa los campos';
                include('view/error.php');
            }
            break;
        case 'actualizar':
            //Se verifican que todos los campos existan
            if ($id && $ciudad && $codigopais && $distrito && $poblacion) {
                //Se llama a la función para insertar una nueva ciudad
                $count = actualizar_ciudad($id, $ciudad, $codigopais, $distrito, $poblacion);
                //Se realiza una redireccion al index o root de la pagina pasando la accion select con los datos
                header("Location: .?accion=seleccionar&ciudad={$ciudad}&actualizado={$count}");
            } else {
                //Se crea un mensaje de error
                $error_message = 'Información de ciudad no válida. Revisa los campos';
                include('view/error.php');
            }
            break;
        case 'borrar':
            if ($id) {
                $count = borrar_ciudad($id);
                header("Location: .?borrado={$count}");
            } else {
                //Se crea un mensaje de error
                $error_message = 'Información de ciudad no válida. Revisa los campos';
                include('view/error.php');
            }
            break;
        default:
            //Por defecto muestra el formulario de crear/leer
            include('view/formulario_crear_leer.php');

    }




?>
