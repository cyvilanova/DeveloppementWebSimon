<?php

function get_header() {
    if (!isset($_SESSION)) {
        include_once $_SERVER['DOCUMENT_ROOT'] . "/website/headers/guest-header.php";
    } else if ($_SESSION["user"]->getAdministrateur()) {
        include_once $_SERVER['DOCUMENT_ROOT'] . "/website/headers/admin-header.php";
    } else {
        include_once $_SERVER['DOCUMENT_ROOT'] . "/website/headers/client-header.php";
    }
}