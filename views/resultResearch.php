<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <script crossorigin="anonymous"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>carnet</title>
</head>
<body>
<!--NAV BAR-->
<nav class="navbar navbar-expand-lg bg-light">
    <div class="container-fluid">
        <button aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation"
                class="navbar-toggler"
                data-bs-target="#navbarTogglerDemo01" data-bs-toggle="collapse" type="button">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <a class="navbar-brand" href="index.php">Hidden brand</a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a aria-current="page" class="nav-link active" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="ajout.php">Ajouter un contact</a>
                </li>
            </ul>
            <form class="d-flex" role="search" action="../php/research.php" method="post">
                <input name="theResearch" aria-label="Search" class="form-control me-2" placeholder="Search"
                       type="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>
<!--EOF NAV BAR-->
<!--TABLEAU-->
<table class="table table-striped caption-top table-hover table-bordered ">
    <caption>Listes des contactes</caption>
    <thead>
    <tr>
        <th>Nom</th>
        <th>Prenom</th>
        <th>telephone</th>
    </tr>
    </thead>
    <tbody>
    <?php

    require '../php/research.php';

    $contacts = researchContacts();

    foreach ($contacts as $contact) {
        ?>
        <tr>
            <td><?php echo $contact['nom'] ?></td>
            <td><?php echo $contact['prenom'] ?></td>
            <td><?php echo $contact['telephone'] ?></td>
        </tr>
        <?php
    }
    ?>
    </tbody>
</table>