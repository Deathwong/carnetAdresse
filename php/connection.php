<?php

$dataBaseName = "carnetAddress";
$host = "localhost";
$port = "3306";
$dsn = "mysql:dbname=$dataBaseName;host=$host;port:$port";
$userName = "root";
$passWord = "";
$connection = null;

/**
 * Permet de récupérer une connection à la base de données
 * @return PDO|void
 */
function getConnection()
{
    global $dsn, $userName, $passWord, $connection;

    try {
        // Test de la connection
        $connection = new PDO($dsn, $userName, $passWord);
        // set the PDO error mode to exception
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $error) {
        print "Connection to data base failed: " . $error->getMessage();
        die();
    }

    return $connection;
}

getConnection();