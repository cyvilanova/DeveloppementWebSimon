<?php

function sanitize_user_input($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input, ENT_HTML401, "utf-8", false);

    return $input;
}