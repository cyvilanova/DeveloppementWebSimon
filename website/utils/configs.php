<?php

function getConnection() {
    $serverName = "127.0.0.1:3307";
    $dbName = "lab_app_media";
    $user = "root";
    $password = "test123";

    try {

        $conn = new PDO("mysql:host=$serverName;dbname=$dbName;charset=utf8", $user, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn;

    } catch (PDOException $exception) {

        echo "CONNECTION FAILED";
        return $exception;
    }
}