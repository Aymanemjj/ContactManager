<!doctype html>
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
                    <a href="register.php" class="btn btn-outline-success">Register</a>
                </div>
            </div>
        </nav>
    </header>


    <section class="m-2 ">
        <form class="w-50" name="loginForm" action="../php/formValidation.php" method="post">

            <label for="fullname" class="form-label">Username</label>
            <input type="text" class="form-control" name="username" aria-describedby="emailHelp">

            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" name="password">

            <input class="btn btn-success w-100 mt-5" type="submit" name="submit" value="logIn" />
        </form>
    </section>



    <?php
    if (isset($_GET['state'])) {
        echo '
        <section>
            <div class="alert alert-danger" role="alert">
                Bad input
            </div>
        </section>';
    }
    ?>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>

</body>

</html>