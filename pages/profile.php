<?php

session_start();

if (!isset($_SESSION['logged_in'])) {
    header("Location: login.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <title>ContactManager</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="../index.php">ContactManager</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent"
                    aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <?php
                    if (isset($_SESSION['logged_in'])) {
                        echo '                    
                            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                <li class="nav-item">
                                    <a class="nav-link active" href="profile.php">Profile</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">ContactList</a>
                                </li>
                            </ul>';
                    }
                    ?>

                    <div class="d-flex gap-2">
                        <?php
                        if (isset($_SESSION['logged_in'])) {
                            echo '<form action="../php/logOut.php" method="post"><button type="submit" href="../pages/login.php" class="btn btn-danger">Log out</button></form>';
                            echo '<a href="profile.php" class="btn btn-success">Welcome ' . $_SESSION['username'] . '</a>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </nav>
    </header>



    <section>
        <?php
        if (isset($_SESSION['logged_in'])) {
            echo '<h1>Welcome ' . $_SESSION['username'] . '</h1>';
        }
        ?>
    </section>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>

</html>