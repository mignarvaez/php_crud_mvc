<?php
    //Se crean las funciones para interactuar con el formulario

    //Selecciona una ciudad por su nombre
    function seleccionar_ciudad_por_nombre($ciudad) {
        //Con la keyword global podemos usar la conexion a la base de datos
        global $db;

        //La consulta usada para encontrar la ciudad
        $query = 'SELECT * FROM city 
                WHERE Name = :city 
                ORDER BY Population DESC';
        //Crea una sentencia pareparada para realizar la consulta
        $statement = $db->prepare($query);
        //El parametro city se vincula con el parametro de la funcion ($ciudad) y se ejecuta la funcion
        $statement->bindValue(':city', $ciudad );
        $statement->execute();
        //El resultado se obtendrá con un fetchall, lo que retornara un arreglo, debido a que existen varias ciudades con un mismo nombre
        $results = $statement->fetchAll();
        //Se cierra el cursos permitiendo ejecutar más consultas
        $statement->closeCursor();
        return $results;
    }

    //Crea una nueva ciudad
    function insertar_ciudad($nuevaciudad, $codigopais, $distrito, $nuevapoblacion){
        global $db;
        //Permite contar las filas afectadas, en caso de que se agregue exitosamente un nuevo registro
        $count = 0;
        $query = "INSERT INTO city 
                        (Name,CountryCode,District,Population) 
                    VALUES 
                        (:newcity, :countrycode, :district, :newpopulation)";
        $statement = $db->prepare($query);
        $statement->bindValue(':newcity', $nuevaciudad);
        $statement->bindValue(':countrycode', $codigopais);
        $statement->bindValue(':district', $distrito);
        $statement->bindValue(':newpopulation', $nuevapoblacion);
        //Pregunta si el resultado de la ejecucion de la consulta fue exitoso
        if ($statement->execute()) {
            //Almacena en la variable count las filas afectadas (1)
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        //Se retorna el valor de count
        return $count;
    }

    //Actualiza la información de una ciudad
    function actualizar_ciudad($id, $ciudad, $codigopais, $distrito, $poblacion){
        global $db;
        $count = 0;
        $query = 'UPDATE city 
        SET Name = :city, CountryCode = :countrycode, District = :district, 
            Population = :population WHERE ID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        $statement->bindValue(':city', $ciudad);
        $statement->bindValue(':countrycode', $codigopais);
        $statement->bindValue(':district', $distrito);
        $statement->bindValue(':population', $poblacion);
        if ($statement->execute()) {
            //Almacena en la variable count las filas afectadas (1)
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }

    //Borra una ciudad segun su id
    function borrar_ciudad($id){
        global $db;
        $count = 0;
        $query = 'DELETE FROM city 
                WHERE ID = :id';
        $statement = $db->prepare($query);
        $statement->bindValue(':id', $id);
        if ($statement->execute()) {
            //Almacena en la variable count las filas afectadas (1)
            $count = $statement->rowCount();
        };
        $statement->closeCursor();
        return $count;
    }
?>