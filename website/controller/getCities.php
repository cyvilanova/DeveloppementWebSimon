<?php
require_once $_SERVER['DOCUMENT_ROOT'] . "/DeveloppementWebSimon/website/model/city.php";

header("Content-Type: application/json");
$result = executeSelect("SELECT pk_ville FROM `lab_app_media`.ville", array());

$tmpArray = array();
while ($row = $result->fetch()) {
    array_push($tmpArray, city::load($row['pk_ville']));
}

$result->closeCursor();
echo json_encode($tmpArray);
