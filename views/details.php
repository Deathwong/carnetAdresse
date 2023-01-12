<!DOCTYPE html>
<html lang="fr">
<?php include 'header.php' ?>
<body>
<!--NAV BAR-->
<?php include 'navbar.php' ?>
<!--EOF NAV BAR-->

<?php
require '../php/utils.php';
require '../php/connection.php';
require "../model/Contact.php";
require '../php/getContact.php';

$id = getElementInRequestByAttribute("id");
$contact = getContactById();
?>

<div class="container-fluid">
    <!--Formulaire-->
    <div>
        <form action="../php/modification.php" method="post" onsubmit="validationModification()"
              id="detailsModificationForm">
            <label>
                <input name="id" class="disabledElement" value="<?= $contact->getId() ?>">
            </label>
            <div class="form-row">
                <!-- Nom -->
                <div class="form-group col-sm-6">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?= $contact->getNom() ?>"
                           disabled>
                    <span id="errorNom"></span>
                </div>
                <!-- Prenom -->
                <div class="form-group col-sm-6">
                    <label for="prenom">Prenom</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" id="prenom" name="prenom"
                           value="<?= $contact->getPrenom() ?>" disabled>
                    <span id="errorPrenom"></span>
                </div>
            </div>
            <div class="form-row">
                <!-- Numéro -->
                <div class="form-group col-md-4">
                    <label for="numero">Numéro</label>
                    <input type="tel" class="form-control" id="numero" name="numero"
                           value="<?= $contact->getTelephone() ?>"
                           disabled>
                    <span id="errorNumero"></span>
                </div>
                <!-- Email -->
                <div class="form-group col-md-4">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control" id="email" name="email"
                           value="<?= $contact->getEmail() ?>"
                           disabled>
                    <span id="errorEmail"></span>
                </div>
                <!-- Date d'anniversaire -->
                <div class="form-group col-md-4">
                    <label for="dateAnniversaire">Date de naissance</label>
                    <input id="dateAnniversaire" class="form-control"
                           name="dateAnniversaire" value="<?= $contact->getDateAnniversaire() ?>" type="date"
                           disabled>
                </div>
            </div>
            <!-- Address -->
            <div class="form-group">
                <label for="address">Adresse</label>
                <input id="address" class="form-control" name="address" value="<?= $contact->getAdresse() ?>"
                       type="text"
                       disabled>
                <span id="errorAdresse"></span>
            </div>
            <!-- Note -->
            <div class="form-group">
                <label for="note">Notes</label>
                <textarea id="note" class="form-control" name="note"
                          disabled><?= $contact->getNote() ?></textarea>
                <span id="errorNote"></span>
            </div>
        </form>

    </div>
    <div>
        <!-- delete Form-->
        <div>
            <form method="post" id="deleteForm" action="../php/delete.php">
                <label>
                    <input name="idDelete" class="disabledElement" value="<?= $id ?>">
                </label>
            </form>
        </div>

        <div class="button-carnet">
            <!-- Button submit -->
            <button id="submitButton" onclick="modificationDetailsSubmit()"
                    class=" btn btn-primary">
                Enregistrer
            </button>

            <!-- Button Cancel-->
            <button id="cancelButton" onclick="refreshPage()" class="btn btn-primary">Cancel</button>

            <!-- Modification Button-->
            <button class="btn btn-primary" onclick="modificationContactHtmlActions()" id="modificationButton">
                Modifier
            </button>

            <!-- modal Button-->
            <button type="button" id="deleteButton" class="btn btn-danger" data-bs-toggle="modal"
                    data-bs-target="#deleteModal">
                Supprimer
            </button>

            <!-- modal delete-->
            <div class="modal fade" id="deleteModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                 aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="deleteModalLabel">Suppression</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            êtes vous sûr de vouloir supprimer ce contact ?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
                            <button type="button" onclick="deleteContactSubmit()" class="btn btn-primary">OUI</button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="button-item">
                <a href="index.php">
                    <button class="btn btn-light">Retourner à l'accueil</button>
                </a>
            </div>
        </div>
    </div>
</div>
<?php include 'footer.php' ?>
<script type="text/javascript">
    hideElements();
    validateEventListener();
</script>
</body>
</html>