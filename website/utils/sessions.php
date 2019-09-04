<?php


function create_session($user) {
    if (isset($_SESSION)) {
        session_abort();
    }

    session_start();
    $_SESSION["user"] = $user;
}

function stop_session() {
    if (isset($_SESSION)) {
        session_unset();
        session_abort();
    }
}

function session_exists() {
    return isset($_SESSION) && !empty($_SESSION["user"]);
}

function redirect_unauthenticated_user($path) {
    if (!isset($_SESSION)) {
        header("Location: " . $path);
        exit();
    }
}