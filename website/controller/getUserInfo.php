<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/DeveloppementWebSimon/website/utils/security.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/DeveloppementWebSimon/website/model/user.php";

try {
    echo json_encode(user::load(sanitize_user_input($_GET["user_id"])));
} catch (Exception $e) {
    echo json_encode("{ \"error\" : " . $e);
}