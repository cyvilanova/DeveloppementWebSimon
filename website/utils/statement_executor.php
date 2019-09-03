<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/website/utils/configs.php";

function executeInsert($statement, $argsArray) {
    $conn = getConnection();
    $prepare = $conn->prepare($statement);

    $prepare->execute($argsArray);

    return $conn->lastInsertId();
}

function executeSelect($statement, $argsMap) {
    $conn = getConnection();
    $stmt = $conn->prepare($statement);

    $stmt->execute($argsMap);

    return $stmt;
}

function executeUpdate($statement, $argsMap) {
    $conn = getConnection();
    $stmt = $conn->prepare($statement);

    $stmt->execute($argsMap);
}