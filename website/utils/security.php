<?php

function sanitize_user_input($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);

    return $input;
}