<?php
require_once $_SERVER['DOCUMENT_ROOT'] ."/website/utils/sessions.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/website/model/client.php";

create_session();

if (!empty($_SESSION["user"])) {

    $result = executeSelect("SELECT * FROM `lab_app_media`.client WHERE fk_utilisateur = :fk_utilisateur",
        array(":fk_utilisateur" => $_SESSION["user"]->getPkUtilisateur()));

    $row = $result->fetch();
    $client = client::load($row["fk_utilisateur"]);
    $result->closeCursor();

    header("Content-Type: application/json");
    echo json_encode($client);
}
