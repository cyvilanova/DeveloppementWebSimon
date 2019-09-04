<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Info++</title>

    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="../global.css">
    <link rel="stylesheet" href="style.css">
    <script src="form-validation.js"></script>
</head>

<body>
    <?php
    require_once $_SERVER['DOCUMENT_ROOT'] . "/website/utils/header_selection.php";
    get_header();
    ?>


<div class="page">
    <form class="form">
        <div class="text">
            Remplissez ce formulaire pour créer votre profil.
        </div>
        <div class="subtext">
            Tous les champs sont obligatoires.
        </div>
        <div class="section">
            <div class="column">
                <input id="nom" placeholder="Nom" required>
                <div class="address">
                    <input id="no_civic" placeholder="No Civic" min="0" type="number" class="number" required>
                    <input id="rue" placeholder="Rue" class="street" required>
                </div>
                <input id="code_postal" placeholder="Code postal" required>
            </div>
            <div class="column">
                <input id="prenom" placeholder="Prénom" required>
                <select required>
                    <option disabled selected>Ville</option>
                    <option>a</option>
                </select>
                <input id="tel" placeholder="Numéro de téléphone" min="0" type="text" required>
            </div>
        </div>
        <div class="text">
            Votre courriel servira à vous identifier lors de votre prochaine visite.
        </div>
        <div class="subtext">
            Le mot de passe doit avoir au moins 1 chiffre, 1 lettre et 8 caractères minimum.
        </div>

        <div class="section">
            <div class="column">
                <input id="couriel" placeholder="Courriel" type="email" required>
                <input placeholder="Mot de passe" type="password" required>
            </div>
            <div class="column">
                <input placeholder="Confirmation du courriel" type="email" required>
                <input placeholder="Confirmation du mot de passe" type="password" required>
            </div>
        </div>
        <div class="newsletter">
            <div>
                <span class="chk" unchecked></span>
                <input type="checkbox" id="newsletter" />
            </div>
            <label for="newsletter">Souhaitez-vous recevoir les promotions et les nouveautés?</label>
        </div>
        <div class="buttons">
            <button type="submit">Confirmer</button>
        </div>
    </form>
</div>
</body>
</html>
