<?php

try {

    $dsn = "mysql:host=localhost;dbname=contactmanager";
    $conn = new PDO($dsn, 'root', 'O2H2sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    } catch (PDOException $e) {
        echo $e->getMessage();
    }


function insertToUsersDB($conn,$data){
    $sql = "INSERT INTO users (username, password) VALUES (?, ?)";
    $stmt= $conn->prepare($sql);
    $stmt->execute([
        $data['username'],
        password_hash($data['password'], PASSWORD_DEFAULT)
    ]);
}