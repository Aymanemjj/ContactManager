<?php

include "PDO.php";


if (!isset($_POST['submit'])) {
    header('Location: ../pages/register.html');
    exit;
}

if (strlen(htmlspecialchars($_POST['username'])) < 3) {
    header("Location: ../pages/register_error.html");
    exit;
} else {
    switch ($_POST['submit']) {
        case 'signUp':
            signUp($conn);
            break;

        case 'logIn':
            logIn($conn);
            break;
    }
}

function signUp($conn){
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ];
    insertToUsersDB($conn, $data);
    header("Location: ../index.php?username=" . $_POST['username']);
    exit;
}

function logIn($conn){
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ];
    header("Location: ../index.php?enterdLogin" );

}

?>








<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>validation</title>
</head>

<body style="background-color: wheat;">

</body>

</html>