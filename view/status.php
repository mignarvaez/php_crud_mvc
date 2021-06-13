
<?php 
    //Se valida si el elemento que se obtiene de los input es 1(operacion exitosa) o 0
    $creado = filter_input(INPUT_GET, "creado", FILTER_VALIDATE_INT);
    $actualizado = filter_input(INPUT_GET, "actualizado", FILTER_VALIDATE_INT);
    $borrado = filter_input(INPUT_GET, "borrado", FILTER_VALIDATE_INT);

    if ($creado) {
        echo "Se agrego una nueva ciudad de manera exitosa";
    }

    if ($actualizado) {
        echo "Se actualizo la información de la ciudad de manera exitosa.";
    }

    if ($borrado) {
        echo "Se elimino la ciudad de manera exitosa.";
    }