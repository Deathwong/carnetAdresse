<?php
declare(strict_types=1);

use model\Contact;
use php\SingletonPDO;

/**
 * Permet de récupérer un contact Par son Id
 * @return Contact
 */
function getContactById(): Contact
{
    global $id;

    //connect to Data Base
    $connection = SingletonPDO::getPDOInstance();;

    //query
    $query = "SELECT * FROM contact WHERE id = $id";
    $executeQuery = $connection->prepare($query);

    //execute the query
    $executeQuery->execute();

    return $executeQuery->fetchObject(Contact::class);
}
