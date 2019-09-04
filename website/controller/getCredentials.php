<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/DeveloppementWebSimon/website/utils/security.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/DeveloppementWebSimon/website/utils/sessions.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/DeveloppementWebSimon/website/model/client.php";

header("Content-Type: application/json");
if (!empty(sanitize_user_input($_POST["email"])) && !empty(sanitize_user_input($_POST["password"]))) {
    $row = $result->fetch();
    $user = user::load($row["pk_utilisateur"]);

    if (password_verify(sanitize_user_input($_POST["password"]), $user->getMotDePasse())) {
        create_session($user);
        echo json_encode("{ \"status\" : \"logged\" }");

    } else {
        echo json_encode("{ \"status\" : \"invalid credentials\" }");

    }

} else {
    echo json_encode("{ \"status\" : \"missing arguments\" }");

}