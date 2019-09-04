<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/DeveloppementWebSimon/website/utils/security.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/DeveloppementWebSimon/website/utils/sessions.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/DeveloppementWebSimon/website/model/client.php";


header("Content-Type: application/json");
if (!empty(sanitize_user_input($_POST["email"])) && !empty(sanitize_user_input($_POST["password"]))) {
    $result = executeSelect("SELECT pk_utilisateur FROM `lab_app_media`.utilisateur WHERE courriel = :courriel",
    array(":courriel" => sanitize_user_input($_POST["email"])));

    $row = $result->fetch();
    $user = user::load($row["pk_utilisateur"]);

    if (password_verify(sanitize_user_input($_POST["password"]), $user->getMotDePasse())) {
        create_session($user);
        echo "{ \"status\" : \"logged\" }";

    } else {
        echo "{ \"status\" : \"invalid credentials\" }";

    }

} else {
    echo "{ \"status\" : \"missing arguments\" }";

}