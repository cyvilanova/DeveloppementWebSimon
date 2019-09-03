<?php

function get_header() {
    if (empty($_SESSION)) {
        include_once $_SERVER['DOCUMENT_ROOT'] . "/website/headers/guest-headers.php";
    } else if ($_SESSION["user"]->getAdministrateur()) {
        include_once $_SERVER['DOCUMENT_ROOT'] . "/website/headers/admin-headers.php";
    } else {
        include_once $_SERVER['DOCUMENT_ROOT'] . "/website/headers/client-headers.php";
    }
}