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
            <form class="d-flex" role="search" action="../views/index.php" method="post">
                <input name="search" aria-label="Search" class="form-control me-2" placeholder="Search"
                       type="search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>