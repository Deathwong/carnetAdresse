<!DOCTYPE html>
<html lang="en">
<?php include 'header.php' ?>
<body>
<!--NAV BAR-->
<?php include 'navbar.php' ?>
<!--EOF NAV BAR-->

<!--Formulaire-->
<div class="container-fluid">
    <form action="../php/Insert.php" method="post" id="ajoutContactForm">
        <div class="form-row">
            <!-- Nom -->
            <div class="form-group col-sm-6">
                <label for="nom">Nom</label>
                <input type="text"
                       class="form-control"
                       id="nom"
                       name="nom"
                       placeholder="nom"
                       required
                       minlength="3"
                       maxlength="50"
                />
            </div>
            <!-- Prenom -->
            <div class="form-group col-sm-6">
                <label for="prenom">Prenom</label>
                <input type="text"
                       class="form-control"
                       aria-describedby="emailHelp"
                       id="prenom"
                       name="prenom"
                       placeholder="prenom"
                       required
                       minlength="2"
                       maxlength="50"
                >
            </div>
        </div>
        <div class="form-row">
            <!-- Numéro -->
            <div class="form-group col-md-4">
                <label for="numero">Numéro</label>
                <input type="tel"
                       class="form-control"
                       id="numero"
                       name="numero"
                       placeholder="numero"
                       required
                       maxlength="20"
                       minlength="3"
                >
            </div>
            <!-- Email -->
            <div class="form-group col-md-4">
                <label for="email">Email address</label>
                <input type="email"
                       class="form-control"
                       id="email"
                       name="email"
                       placeholder="email"
                       minlength="5"
                       maxlength="100"
                />
            </div>
            <!-- Date d'anniversaire -->
            <div class="form-group col-md-4">
                <label for="dateAnniversaire">Date de naissance</label>
                <input id="dateAnniversaire"
                       class="form-control"
                       name="dateAnniversaire"
                       placeholder="date d'Anniversaire"
                       type="date"
                />
            </div>
        </div>
        <!-- Address -->
        <div class="form-group">
            <label for="address">Adresse</label>
            <input id="address"
                   class="form-control"
                   name="address"
                   placeholder="address"
                   type="text"
                   maxlength="100"
            />
        </div>
        <b></b>
        <!-- Note -->
        <div class="form-group">
            <label for="note">Notes</label>
            <textarea id="note"
                      class="form-control"
                      name="note"
                      placeholder="note"
                      maxlength="100"></textarea>
        </div>


    </form>
    <div class="button-carnet">
        <!-- Submit -->
        <div class="button-item">
            <button class="btn btn-primary" onclick="saveMyContact(event)">Enregistrer</button>
        </div>
        <div class="button-item">
            <a href="index.php">
                <button class="btn btn-light">Retourner à l'accueil</button>
            </a>
        </div>
    </div>
</div>
<!--Formulaire-->
<?php include 'footer.php' ?>
</body>
</html>