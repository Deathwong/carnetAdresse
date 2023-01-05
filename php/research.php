<?php

$connection = getConnection();
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
//$queryString = foo=bar&baz=boom&cow=milk&php=hypertext+processor

//    $url = 'http://localhost/carnetAdresse/views/index.php?' . $queryString;

//    header("Location: $url");

    // Contacts de la page courante
    return getCurrentPageContactsResearch($search, $firstContactsOfThePage, $parPage);
}

/**
 * @param mixed $theResearch
 * @param $firstContactOfPage
 * @param int $parPage
 * @return array
 */
function getCurrentPageContactsResearch(mixed $theResearch, $firstContactOfPage, int $parPage): array
{
    global $connection, $parPage;

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
    return $executeQuery->fetchAll(PDO::FETCH_ASSOC);
}


/**
 * @return int Nombre de totaux de contacts de la recherche
 */
function getNombreTotalContactResearch(): int
{
    global $connection;

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

    return $result['nombre_total'];
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