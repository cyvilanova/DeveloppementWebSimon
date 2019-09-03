<?php


function create_session($user) {
    if (!empty($_SESSION)) {
        session_abort();
    }

    session_start(array("user" => $user));
}

function stop_session() {
    if (!empty($_SESSION)) {
        session_unset();
        session_abort();
    }
}