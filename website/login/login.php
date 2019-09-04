<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Info++</title>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="style.css">
    <script src="user.js"></script>

</head>
<body>

<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/website/utils/header_selection.php";
    get_header();
?>

<div class="page">

    <div class="text">
        Veuillez vous identifier pour avoir la possibilité d'acheter des formations.
    </div>

    <form class="form">

        <div class="inputs">
            <input type="email" placeholder="Courriel" required id="email">
            <input type="password" placeholder="Mot de passe" required id="password">
        </div>

        <a href="">Mot de passe oublié</a>

        <div class="buttons">
            <a>Connexion</a>
            <a href="../user-form/form.php">S'inscrire</a>
        </div>

    </form>
</div>

</body>
</html>
