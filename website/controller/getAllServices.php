<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/DeveloppementWebSimon/website/utils/security.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/DeveloppementWebSimon/website/model/service.php";


$result = executeSelect("SELECT pk_service FROM `lab_app_media`.service ORDER BY service_titre", array());
$services = array();

while ($row = $result->fetch()) {
    array_push($services, service::load($row["pk_service"]));
}

$result->closeCursor();

header("Content-Type: application/json");
echo json_encode($services);

