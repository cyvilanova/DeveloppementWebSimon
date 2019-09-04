<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/website/utils/sessions.php";

create_session();

if (session_exists()) {
    stop_session();
    header("Location: ../login/login.php");
}