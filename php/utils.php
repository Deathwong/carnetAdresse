<?php

function getElementInRequestByAttribute(string $param): string
{
    $value = "";
    switch ($param) {
        case isset($_POST[$param]):
            $value = strip_tags($_POST[$param]);
            break;
        case isset($_GET[$param]):
            $value = strip_tags($_GET[$param]);
            break;

        case isset($_FILES[$param]):
            $value = strip_tags($_FILES[$param]);
            break;

        case isset($_ENV[$param]):
            $value = strip_tags($_ENV[$param]);
            break;

        case isset($_COOKIE[$param]):
            $value = strip_tags($_COOKIE[$param]);
            break;

        case isset($_REQUEST[$param]):
            $value = strip_tags($_REQUEST[$param]);
            break;

        case isset($_SERVER[$param]):
            $value = strip_tags($_SERVER[$param]);
            break;

        case isset($_SESSION[$param]):
            $value = strip_tags($_SESSION[$param]);
            break;

        default:
            echo "Param not found";
    }

    return $value;
}
