<?php

/**
 * @return string
 */
function nombresContactsParPages(): string
{
    if (!isset($_GET["contactsParPages"])) {
        $parPages = 5;
    } else {
        $parPages = $_GET["contactsParPages"];
    }
    return $parPages;
}
