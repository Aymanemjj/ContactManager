<?php

try {

    $dsn = "mysql:host=localhost;dbname=contactmanager";
    $conn = new PDO($dsn, 'root', 'O2H2sql');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    } catch (PDOException $e) {
        echo $e->getMessage();
    }