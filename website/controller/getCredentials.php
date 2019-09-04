<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/website/utils/security.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/website/utils/sessions.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/website/model/client.php";



header("Content-Type: application/json");
if (!empty(sanitize_user_input($_POST["email"])) && !empty(sanitize_user_input($_POST["password"]))) {
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