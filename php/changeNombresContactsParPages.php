<?php

namespace php;

class ChangeNombresContactsParPages
{
    public static function changeContactsNombreContactParPage($search, $nbrContactParPage): void
    {
        header("location: ../views/index.php?contactsParPages=" . $nbrContactParPage . "->nbrContactParPage&isSearchActive=" . $search);
    }
}

ChangeNombresContactsParPages::changeContactsNombreContactParPage($_GET["theSearch"], $_GET["contactsParPages"]);