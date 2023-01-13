<?php

use php\SingletonPDO;

require 'connection.php';
require '../utils/utils.php';


/**
 * Supprime le contact à partir de l'id
 * @return void
 */
function deleteContact(): void
{
    //connect to Data Base
    $id = getElementInRequestByAttribute("idDelete");

    $connection = SingletonPDO::getPDOInstance();

    //query
    $query = "DELETE FROM contact WHERE id = $id";
    $executeQuery = $connection->prepare($query);

    //execute the query
    $executeQuery->execute();

    //renvoyer vers la page d'accueil
    header('location: ../views/index.php');
}

deleteContact();