<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/website/utils/sessions.php";

function get_header() {
    create_session();
    if (empty($_SESSION)) {
        echo print_r($_SESSION);
        include_once $_SERVER['DOCUMENT_ROOT'] . "/website/headers/guest-header.php";
    } else if (!empty($_SESSION["user"])) {
        if ($_SESSION["user"]->getAdministrateur())
            include_once $_SERVER['DOCUMENT_ROOT'] . "/website/headers/admin-header.php";
        else
            include_once $_SERVER['DOCUMENT_ROOT'] . "/website/headers/client-header.php";
    }

}
