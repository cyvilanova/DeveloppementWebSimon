<?php
require_once $_SERVER['DOCUMENT_ROOT'] ."/DeveloppementWebSimon/website/utils/security.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/DeveloppementWebSimon/website/model/service.php";

if (!empty(sanitize_user_input($_GET["service_id"]))) {
    echo json_encode(service::load(sanitize_user_input($_GET["service_id"])));

} else {
    echo "{ \"error\" : \"invalid request\"}";

}