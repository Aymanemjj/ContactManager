<?php

include "PDO.php";


if (!isset($_POST['submit'])) {
    header('Location: ../pages/register.php');
    exit;
}

if (strlen(trim($_POST['username'])) < 3) {
    header("Location: ../pages/register.php?state=error");
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

function signUp($conn)
{
    if (strlen(trim($_POST['username'])) < 3) {
        header("Location: ../pages/register.php?state=error");
        exit;
    } elseif (strlen(trim($_POST['password'])) < 6) {
        header("Location: ../pages/register.php?state=error");
        exit;
    }
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ];

    if (checkUsername($conn, $data['username'])) {
        header("Location: ../pages/register.php?state=error");
        exit;
    } else {
        insertToUsersDB($conn, $data);
        $userId = $conn->lastInsertId();

        session_start();
        session_regenerate_id(true);

        $_SESSION['user_id']   = $userId;
        $_SESSION['username']  = $data['username'];
        $_SESSION['logged_in'] = true;

        header("Location: ../pages/profile.php");
        exit;
    }
}

function logIn($conn)
{
    $data = [
        'username' => $_POST['username'],
        'password' => $_POST['password']
    ];

    if (!checkUsername($conn, $data['username'])) {
        header("Location: ../pages/login.php?state=error");
        exit;
    } elseif (!checkPassword($conn, $data['password'], $data['username'])) {
        header("Location: ../pages/login.php?state=error");
        exit;
    } else {
        session_start();
        session_regenerate_id(true);
        $_SESSION['user_id'] = getUserId($conn, $data['username']);
        $_SESSION['username']  = $data['username'];
        $_SESSION['logged_in'] = true;
        header("Location: ../pages/profile.php?username=");
        exit;
    }
}


function checkUsername($conn, $username)
{

    $stmt = $conn->prepare(
        "SELECT COUNT(*) AS MyCount FROM users WHERE username = ?"
    );
    if ($stmt->execute([$username])) {
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return ($row['MyCount'] == 1);
    };
}


function checkPassword($conn, $password, $username)
{
    $stmt = $conn->prepare(
        "SELECT id, password FROM users WHERE username = ? LIMIT 1"
    );
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    if (password_verify($password, $user['password'])) {
        return true;
    } else {
        return false;
    }
}

function getUSerId($conn, $username)
{
    $stmt = $conn->prepare(
        "SELECT id FROM users WHERE username = ? LIMIT 1"
    );
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
}
