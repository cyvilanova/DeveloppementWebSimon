<?php
require_once $_SERVER['DOCUMENT_ROOT'] ."/website/utils/security.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/website/model/service.php";

header("Content-Type: application/json");
if (!empty(sanitize_user_input($_GET["service_id"]))) {
    echo json_encode(service::load(sanitize_user_input($_GET["service_id"])));

} else {
    echo "{ \"error\" : \"invalid request\"}";

}