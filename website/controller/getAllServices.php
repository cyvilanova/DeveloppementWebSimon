<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/website/utils/security.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/website/model/service.php";


$result = executeSelect("SELECT pk_service FROM `lab_app_media`.service", array());
$services = array();

while ($row = $result->fetch()) {
    array_push($services, service::load($row["pk_service"]));
}

$result->closeCursor();

echo json_encode($services);

