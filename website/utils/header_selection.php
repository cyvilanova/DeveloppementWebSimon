<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/DeveloppementWebSimon/website/utils/sessions.php";

function get_header() {
    create_session();
    if (empty($_SESSION)) {
        include_once $_SERVER['DOCUMENT_ROOT'] . "/DeveloppementWebSimon/website/headers/guest-header.php";
    } else if (!empty($_SESSION["user"])) {
        if ($_SESSION["user"]->getAdministrateur())
            include_once $_SERVER['DOCUMENT_ROOT'] . "/DeveloppementWebSimon/website/headers/admin-header.php";
        else
            include_once $_SERVER['DOCUMENT_ROOT'] . "/DeveloppementWebSimon/website/headers/client-header.php";
    }

}
