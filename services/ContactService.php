<?php

namespace services;

use PDOException;
use php\SingletonPDO;

require '../php/connection.php';
require '../utils/utils.php';

class ContactService
{

    public static function insert(): int
    {
        $connection = SingletonPDO::getPDOInstance();
        $idContactSave = null;

        // Insert Adresse
        $idAdresse = 1;

        // Get form element
        $data = ContactService::getContactFormValues($idAdresse);


        $query = "INSERT INTO contact (nom, prenom, surnom, telephone, email, idAdresse, dateAnniversaire, note)
                            VALUE (:nom, :prenom, :surnom, :telephone, :email, :idAdresse, :dateAnniversaire, :note)";
        $saveSQLRequest = $connection->prepare($query);

        // Execute the query
        try {
            $isSave = $saveSQLRequest->execute($data);

            if ($isSave) {
                $idContactSave = $connection->lastInsertId();
                header("location: ../views/details.php?id=$idContactSave");
            } else {
                header('location: ../views/ajout.php');
            }
        } catch (PDOException $error) {
            print "Connection to data base failed: " . $error->getMessage();
            header('location: ../views/ajout.php');
            die();
        }

        return $idContactSave;
    }

    private static function getContactFormValues(int $idAdresse): array
    {
        return [
            'idAdresse' => $idAdresse,
            'nom' => getElementInRequestByAttribute("nom"),
            'prenom' => getElementInRequestByAttribute("prenom"),
            'surnom' => getElementInRequestByAttribute("surnom"),
            'telephone' => getElementInRequestByAttribute("numero"),
            'email' => getElementInRequestByAttribute("email"),
            'dateAnniversaire' => getElementInRequestByAttribute("dateAnniversaire"),
            'note' => getElementInRequestByAttribute("note")
        ];
    }
}