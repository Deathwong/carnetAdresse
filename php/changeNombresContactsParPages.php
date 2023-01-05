<?php
function changeContactsNombreContactParPage(): void
{
    $isSearch = theSearch();
    $parPages = parPagesForLinks();
    header("location: ../views/index.php?contactsParPages=$parPages&isSearchActive=$isSearch");
}

/**
 * @return mixed
 */
function parPagesForLinks(): mixed
{
    return $_GET["contactsParPages"];
}

function theSearch(): mixed
{
    return $_GET["theSearch"];
}


changeContactsNombreContactParPage();