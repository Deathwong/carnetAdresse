<?php

$connection = getConnection();

function afficherContact(): array
{
    //connect to Data Base
    global $connection;

    //query
    $query = "SELECT * FROM contact";
    $executeQuery = $connection->prepare($query);

    //execute the query
    $executeQuery->execute();

    //récupérer dans un tableau
    return $executeQuery->fetchAll(PDO::FETCH_ASSOC);
}
