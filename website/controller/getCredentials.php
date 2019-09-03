<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/website/utils/security.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/website/utils/sessions.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/website/model/client.php";


if (!empty(sanitize_user_input($_GET["email"])) && !empty(sanitize_user_input($_GET["password"]))) {

    $result = executeSelect("SELECT pk_utilisateur FROM `lab_app_media`.utilisateur WHERE courriel = :courriel",
    array(":courriel" => sanitize_user_input($_GET["email"])));

    $row = $result->fetch();
    $user = user::load($row["pk_utilisateur"]);

    if (password_verify(sanitize_user_input($_GET), $user->getMotDePasse())) {
        create_session($user);
    }

} else {

    echo "{ \"status\" : \"missing arguments\" }";

}