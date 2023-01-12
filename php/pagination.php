<?php

use model\Contact;
use php\SingletonPDO;

function getContacts(): array
{
    global $parPage;

    // Récupération de la page courante
    $currentPage = getCurrentPage();

    // Calcul du 1er article de la page
    $firstContactOfPage = getFirstContactOfThePage($currentPage, $parPage);

    // Contacts de la page courante
    return getCurrentPageContact($firstContactOfPage, $parPage);
}

/**
 * @param $firstContactOfPage
 * @param int $parPage
 * @return array|false
 */
function getCurrentPageContact($firstContactOfPage, int $parPage)
{
    $connection = SingletonPDO::getPDOInstance();

    $executeQuery = 'SELECT * FROM contact ORDER BY id DESC LIMIT :firstContactOfPage, :parPage';

    // On prépare la requête
    $executeQuery = $connection->prepare($executeQuery);

    $executeQuery->bindValue(':firstContactOfPage', $firstContactOfPage, PDO::PARAM_INT);
    $executeQuery->bindValue(':parPage', $parPage, PDO::PARAM_INT);

    // On exécute
    $executeQuery->execute();

    // On récupère les valeurs dans un tableau associatif
    return $executeQuery->fetchAll(PDO::FETCH_CLASS, Contact::class);
}

/**
 * @param int $currentPage
 * @param int $parPage
 * @return float|int
 */
function getFirstContactOfThePage(int $currentPage, int $parPage): float|int
{
    return ($currentPage * $parPage) - $parPage;
}

/**
 * Permet de calculer le nombre de pages total
 * @param int $nombreTotalContacts Nombre total de contact dans la base de données
 * @return int Nombre de pages
 */
function getNombreDePages(int $nombreTotalContacts): int
{
    global $parPage;
    return ceil($nombreTotalContacts / $parPage);
}

/**
 * @return int Nombre de totaux de contact dans la base de données
 */
function getNombreTotalContact(): int
{
    $connection = SingletonPDO::getPDOInstance();

    //request
    $query = "SELECT COUNT(1)  as nombre_total from contact";
    //prepare request
    $executeQuery = $connection->prepare($query);
    //execute request
    $executeQuery->execute();

    //on récupère le nom de contact
    $result = $executeQuery->fetch();

    return $result->nombre_total;
}

/**
 * @return int numero de page courante
 */
function getCurrentPage(): int
{
    // On détermine la page sur quelle on se trouve
    $currentPage = 1;

    if (isset($_GET['currentPage']) && !empty($_GET['currentPage'])) {
        $currentPage = (int)strip_tags($_GET['currentPage']);
    }

    return $currentPage;
}

function isSearch(): bool
{
    // On détermine la page sur quelle on se trouve
    $isSearchAtt = false;

    if (isset($_GET['isSearchActive']) && !empty($_GET['isSearchActive'])) {
        $isSearchAtt = true;
    }

    return $isSearchAtt;
}