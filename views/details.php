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
require '../php/getLastContact.php';

$id = getElementInRequestByAttribute("id");
$contacts = getIdContact();
?>

<div class="container-fluid">
    <!--Formulaire-->
    <div>
        <form action="../php/modification.php" method="post" onsubmit="validationModification()"
              id="detailsModificationForm">
            <label>
                <input name="id" class="disabledElement" value="<?php echo $id ?>">
            </label>

            <div class="form-row">
                <!-- Nom -->
                <div class="form-group col-sm-6">
                    <label for="nom">Nom</label>
                    <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $contacts["nom"] ?>"
                           disabled>
                    <span id="errorNom"></span>
                </div>
                <!-- Prenom -->
                <div class="form-group col-sm-6">
                    <label for="prenom">Prenom</label>
                    <input type="text" class="form-control" aria-describedby="emailHelp" id="prenom" name="prenom"
                           value="<?php echo $contacts["prenom"] ?>" disabled>
                    <span id="errorPrenom"></span>
                </div>
            </div>
            <div class="form-row">
                <!-- Numéro -->
                <div class="form-group col-md-4">
                    <label for="numero">Numéro</label>
                    <input type="tel" class="form-control" id="numero" name="numero"
                           value="<?php echo $contacts["telephone"] ?>"
                           disabled>
                    <span id="errorNumero"></span>
                </div>
                <!-- Email -->
                <div class="form-group col-md-4">
                    <label for="email">Email address</label>
                    <input type="text" class="form-control" id="email" name="email"
                           value="<?php echo $contacts["email"] ?>"
                           disabled>
                    <span id="errorEmail"></span>
                </div>
                <!-- Date d'anniversaire -->
                <div class="form-group col-md-4">
                    <label for="dateAnniversaire">Date de naissance</label>
                    <input id="dateAnniversaire" class="form-control"
                           name="dateAnniversaire" value="<?php echo $contacts["date_anniversaire"] ?>" type="date"
                           disabled>
                </div>
            </div>
            <!-- Address -->
            <div class="form-group">
                <label for="address">Adresse</label>
                <input id="address" class="form-control" name="address" value="<?php echo $contacts["adresse"] ?>"
                       type="text"
                       disabled>
                <span id="errorAdresse"></span>
            </div>
            <!-- Note -->
            <div class="form-group">
                <label for="note">Notes</label>
                <textarea id="note" class="form-control" name="note"
                          disabled><?php echo $contacts["note"] ?>g</textarea>
                <span id="errorNote"></span>
            </div>
        </form>

    </div>
    <div>
        <!-- delete Form-->
        <div>
            <form method="post" id="deleteForm" action="../php/delete.php">
                <label>
                    <input name="idDelete" class="disabledElement" value="<?php echo $id ?>">
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