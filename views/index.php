<!DOCTYPE html>
<html lang="fr">
<?php include 'header.php' ?>
<body>
<!--NAV BAR-->
<?php include 'navbar.php' ?>
<!--EOF NAV BAR-->
<div class="container-fluid">
    <!--TABLEAU-->
    <table class="table table-striped caption-top table-hover table-bordered ">
        <caption>Listes des contactes</caption>
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prenom</th>
            <th>Telephone</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <form action="details.php" method="post" id="formIndexToDetails"
              name="formIndexToDetails"
              class="disabledElement">
            <?php
            include "../php/connection.php";
            require "../php/research.php";
            require "../php/pagination.php";
            require "../php/nombreDeContactsParPage.php";
            require "../model/Contact.php";

            // Pagination
            $parPageSelectBox = nombresContactsParPages();
            $parPage = intval($parPageSelectBox);
            $currentPage = getCurrentPage();
            $isSearch = getResearchLibelle();
            $isSearchAtt = isSearch();

            if (isset($_POST['search']) || $isSearchAtt) {
                $_SESSION["isSearch"] = true;
                $contacts = researchContacts();
                $nombreTotalContacts = getNombreTotalContactResearch();
            } else {
                $contacts = getContacts();
                $nombreTotalContacts = getNombreTotalContact();
            }

            $nombreDePages = getNombreDePages($nombreTotalContacts);

            foreach ($contacts as $contact) {
                ?>
                <tr>
                    <td><?= $contact->getNom() ?></td>
                    <td><?= $contact->getPrenom() ?></td>
                    <td><?= $contact->getTelephone() ?></td>
                    <td>
                        <div class="button-carnet">
                            <a href="#" onclick="formIndexToDetailsSubmit(<?= $contact->getId() ?>)">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>
                            <a type="button" id="deleteButton" data-bs-toggle="modal"
                               data-bs-target="#deleteModal" href="#"
                               onclick="getId(<?= $contact->getId() ?>)">
                                <i class="fa-solid fa-trash-can"></i>
                            </a>
                            <a href="#" onclick="formIndexToDetailsSubmit(<?= $contact->getId() ?>)">
                                <i class="fa-solid fa-eye"></i>
                            </a>
                        </div>
                    </td>
                </tr>
                <?php

            }
            ?>
            <label>
                <input value="" name="id" id="id" class="disabledElement">
            </label>
        </form>
        </tbody>
    </table>
    <!-- delete Form-->
    <div>
        <form method="post" id="deleteFormIndex" action="../php/delete.php">
            <label>
                <input name="idDelete" id="idDelete" class="disabledElement" value="">
            </label>
        </form>
    </div>
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
                    ??tes vous s??r de vouloir supprimer ce contact ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">NON</button>
                    <button type="button" onclick="submitDeleteForm()" class="btn btn-primary">OUI</button>
                </div>
            </div>
        </div>
    </div>
    <div class="onSameLine">
        <div>
            <nav>
                <ul class="pagination">
                    <!--        Lien vers la page pr??c??dente (d??sactiv?? si on se trouve sur la 1 ??re page)-->
                    <li class="page-item <?= ($currentPage == 1) ? "disabled" : "" ?>">
                        <a href="./?currentPage=<?= $currentPage - 1 ?>&isSearchActive=<?= $isSearch ?>
                &contactsParPages=<?= $parPage ?>"
                           class="page-link">Pr??c??dente</a>
                    </li>
                    <?php for ($page = 1; $page <= $nombreDePages; $page++): ?>
                        <!--            Lien vers chacune des pages (activ?? si on se trouve sur la page correspondante)-->
                        <li class="page-item <?= ($currentPage == $page) ? "active" : "" ?>">
                            <a href="./?currentPage=<?= $page ?>&isSearchActive=<?= $isSearch ?>
                    &contactsParPages=<?= $parPage ?>"
                               class="page-link"><?= $page ?></a>
                        </li>
                    <?php endfor ?>
                    <!--        Lien vers la page suivante (d??sactiv?? si on se trouve sur la derni??re page)-->
                    <li class="page-item <?= ($currentPage == $nombreDePages) ? "disabled" : "" ?>">
                        <a href="./?currentPage=<?= $currentPage + 1 ?>&isSearchActive=<?= $isSearch ?>
                &contactsParPages=<?= $parPage ?>"
                           class="page-link">Suivante</a>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- select Box-->
        <div>
            <form method="get" name="nbrOccurrencesFrom" id="nbrOccurrencesFrom"
                  action="../php/changeNombresContactsParPages.php">
                <label>
                    <select name="contactsParPages" class="form-select ms-1" id="selectBoxNbrOccurrences"
                            onchange="selectBoxSubmit()">
                        <option value="5">5</option>
                        <option value="10">10</option>
                        <option value="15">15</option>
                    </select>
                </label>
                <label>
                    <input name="theSearch" value="<?= $isSearch ?>" class="disabledElement">
                </label>
            </form>
        </div>
    </div>
</div>
<!--Footer-->
<?php include 'footer.php' ?>

<script>
    setValueSelectBoxNumberOccurrence(<?= $parPage ?>);
</script>
</body>
</html>