<?php

$connection = getConnection();

/**
 * Donne le contact de l'id
 * @return array
 */
function getIdContact(): array
{
    //connect to Data Base
    global $connection, $id;

    //query
    $query = "SELECT * FROM contact WHERE id = $id";
    $executeQuery = $connection->prepare($query);

    //execute the query
    $executeQuery->execute();

    //récupérer dans un tableau
    return $executeQuery->fetch();
}
