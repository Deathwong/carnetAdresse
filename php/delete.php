<?php
require 'connection.php';
require 'utils.php';

$id = getElementInRequestByAttribute("idDelete");

$connection = getConnection();

/**
 * Supprime le contact à partir de l'id
 * @return void
 */
function deleteContact(): void
{
    //connect to Data Base
    global $connection, $id;

    //query
    $query = "DELETE FROM contact WHERE id = $id";
    $executeQuery = $connection->prepare($query);

    //execute the query
    $executeQuery->execute();

    //renvoyer vers la page d'accueil
    header('location: ../views/index.php');
}

deleteContact();