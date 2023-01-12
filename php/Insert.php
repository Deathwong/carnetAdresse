<?php

use php\SingletonPDO;

require 'connection.php';

function saveContact(): void
{
    $connection = SingletonPDO::getPDOInstance();

    // Get form element
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $telephone = $_POST["numero"];
    $email = null;
    $adresse = null;
    $date_anniversaire = null;
    $note = null;

    if (isset($_POST["dateAnniversaire"]) && !empty($_POST["dateAnniversaire"])) {
        $date_anniversaire = $_POST["dateAnniversaire"];
    }

    if (isset($_POST ["address"])) {
        $adresse = $_POST ["address"];
    }

    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    }

    if (isset($_POST["note"]) && !empty($_POST["note"])) {
        $note = $_POST["note"];
    }


    $query = "INSERT INTO contact (nom, prenom, telephone, email, adresse, date_anniversaire, note)
    VALUE (:nom, :prenom, :telephone, :email, :adresse, :date_anniversaire, :note)";
    $saveSQLRequest = $connection->prepare($query);


    //  Binding value
    $saveSQLRequest->bindParam(':nom', $nom);
    $saveSQLRequest->bindParam(':prenom', $prenom);
    $saveSQLRequest->bindParam(':telephone', $telephone);
    $saveSQLRequest->bindParam(':email', $email);
    $saveSQLRequest->bindParam(':adresse', $adresse);
    $saveSQLRequest->bindParam(':date_anniversaire', $date_anniversaire);
    $saveSQLRequest->bindParam(':note', $note);

    // Execute the query
    try {
        $isSave = $saveSQLRequest->execute();

        if ($isSave) {
            print "$prenom $nom a été bien inséré";
            $id = $connection->lastInsertId();
            header("location: ../views/details.php?id=$id");
        } else {
            header('location: ../views/ajout.php');
        }
    } catch (PDOException $error) {
        print "Connection to data base failed: " . $error->getMessage();
        header('location: ../views/ajout.php');
        die();
    }
}

saveContact();