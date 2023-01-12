<?php

use php\SingletonPDO;

require 'connection.php';

function modification(): void
{
    $connection = SingletonPDO::getPDOInstance();

    // Get form element
    $id = $_POST["id"];
    $nom = $_POST["nom"];
    $prenom = $_POST["prenom"];
    $telephone = $_POST["numero"];
    $email = $_POST["email"];
    $adresse = $_POST ["address"];
    $date_anniversaire = $_POST["dateAnniversaire"];
    $note = $_POST["note"];

    $query = "UPDATE contact SET nom = :nom, prenom = :prenom, telephone = :telephone, email = :email
                 , adresse = :adresse, date_anniversaire = :date_anniversaire, note = :note WHERE id = :id";

    $modifySQLRequest = $connection->prepare($query);

    //  Binding value
    $modifySQLRequest->bindParam(':nom', $nom);
    $modifySQLRequest->bindParam(':prenom', $prenom);
    $modifySQLRequest->bindParam(':telephone', $telephone);
    $modifySQLRequest->bindParam(':email', $email);
    $modifySQLRequest->bindParam(':adresse', $adresse);
    $modifySQLRequest->bindParam(':date_anniversaire', $date_anniversaire);
    $modifySQLRequest->bindParam(':note', $note);
    $modifySQLRequest->bindParam(':id', $id);

    try {
        $isSave = $modifySQLRequest->execute();

        if ($isSave) {
            print "$prenom $nom a été bien inséré";

            header("location: ../views/details.php?id=$id");

        } else {
            print "$prenom $nom n'a pas été bien inséré";
            header('location: ../views/index.php');
        }
    } catch (PDOException $error) {
        print "Connection to data base failed: " . $error->getMessage();
        header('location: ../views/index.php');
        die();
    }

}

modification();