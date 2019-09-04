<?php

function create_session($user=null) {
    require_once $_SERVER['DOCUMENT_ROOT'] ."/DeveloppementWebSimon/website/model/user.php";
    session_start();

    if (!empty($user))
        $_SESSION["user"] = $user;

}

function stop_session() {
    if (!empty($_SESSION) AND !empty(session_id())) {
        session_unset();
        session_destroy();
        $_SESSION = array();
    }
}

function session_exists() {
    return !empty(session_id()) && !empty($_SESSION["user"]);
}

function redirect_unauthenticated_user($path) {
    if (!empty(session_id())) {
        header("Location: " . $path);
        exit();
    }
}