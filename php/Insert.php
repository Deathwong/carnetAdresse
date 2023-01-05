<?php
require 'connection.php';

$connection = getConnection();

// Get form element
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$telephone = $_POST["numero"];
$email = $_POST["email"];
$adresse = $_POST ["address"];
$date_anniversaire = $_POST["dateAnniversaire"];
$note = $_POST["note"];

function saveContact(): void
{
    global $connection, $nom, $prenom, $telephone, $email, $adresse, $date_anniversaire, $note;


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
            // recuperation de l'id
            $id = $connection->lastInsertId();
            header("location: ../views/details.php?id=$id"); // Renseigner l'id à la place du 4

        } else {
            header('location: ../views/ajout.php');
        }
    } catch (PDOException $error) {
        print "Connection to data base failed: " . $error->getMessage();
        header('location: ../views/index.php');
        die();
    }

    // Return to home page

}

saveContact();