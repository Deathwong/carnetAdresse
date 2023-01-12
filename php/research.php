<?php

use model\Contact;
use php\SingletonPDO;

function researchContacts(): array
{
    global $parPage;

    $search = getResearchLibelle();

    // Récupération de la page courante
    $currentPage = getCurrentPage();

    // Calcul du 1er article de la page
    $firstContactsOfThePage = getFirstContactOfThePage($currentPage, $parPage);

    $data = array('currentPage' => $currentPage,
        'isSearchActive' => $search);

    $queryString = http_build_query($data);

    // Contacts de la page courante
    return getCurrentPageContactsResearch($search, $firstContactsOfThePage, $parPage);
}

/**
 * @param mixed $theResearch
 * @param $firstContactOfPage
 * @param int $parPage
 * @return array
 */
function getCurrentPageContactsResearch(mixed $theResearch, $firstContactOfPage, int $parPage)
{
    global $parPage;

    $connection = SingletonPDO::getPDOInstance();

    //the query
    $query = "SELECT * FROM contact 
         where nom like '%$theResearch%' or prenom like '%$theResearch%'  
         order by nom, prenom DESC 
         LIMIT :firstContactOfPage, :parPage";

    //prepare the query
    $executeQuery = $connection->prepare($query);

    $executeQuery->bindValue(':firstContactOfPage', $firstContactOfPage, PDO::PARAM_INT);
    $executeQuery->bindValue(':parPage', $parPage, PDO::PARAM_INT);

    //execute the request
    $executeQuery->execute();

    //récupérer dans un tableau
    return $executeQuery->fetchAll(PDO::FETCH_CLASS, Contact::class);
}


/**
 * @return int Nombre de totaux de contact de la recherche
 */
function getNombreTotalContactResearch(): int
{
    $connection = SingletonPDO::getPDOInstance();
    $theResearch = getResearchLibelle();

    //request
    $query = "SELECT COUNT(1)  as nombre_total from contact 
            where nom like '%$theResearch%' or prenom like '%$theResearch%'";
    //prepare request
    $executeQuery = $connection->prepare($query);

    //execute request
    $executeQuery->execute();

    //on récupère le nom de contact
    $result = $executeQuery->fetch();

    return $result->nombre_total;
}

function getResearchLibelle(): string
{
    // On détermine la page sur quelle on se trouve
    $searchLibelle = "";

    if (isset($_POST["search"])) {
        $searchLibelle = $_POST["search"];
    } else if (isset($_GET['isSearchActive']) && !ctype_space($_GET['isSearchActive'])) {
        $searchLibelle = strip_tags(trim($_GET['isSearchActive']));
    }

    return $searchLibelle;
}