<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/website/utils/statement_executor.php";

class user
{

    private $pk_utilisateur;
    private $courriel;
    private $mot_de_passe;
    private $administrateur;

    public static function load($pk_utilisateur) {
        $result = executeSelect("SELECT * FROM `lab_app_media`.utilisateur
        WHERE `utilisateur`.pk_utilisateur = :pk_utilisateur", array(":pk_utilisateur" => $pk_utilisateur));

        $user = new user();
        $row = $result->fetch();

        $user->setAdministrateur($row["administrateur"]);
        $user->setCourriel($row["courriel"]);
        $user->setMotDePasse($row["mot_de_passe"]);
        $user->setPkUtilisateur($pk_utilisateur);

        $result->closeCursor();

        return $user;
    }

    public static function create($administrateur, $courriel, $mot_de_passe) {
        $mot_de_passe = password_hash($mot_de_passe, CRYPT_BLOWFISH);

        $result = executeInsert("INSERT INTO `lab_app_media`.`utilisateur`(courriel, mot_de_passe, administrateur)
        VALUES (:courriel, :mot_de_passe, :administrateur)", array(":courriel" => $courriel,
            ":mot_de_passe" => $mot_de_passe, ":administrateur" => (int) $administrateur));

        $user = new user();

        $user->setPkUtilisateur($result);
        $user->setMotDePasse($mot_de_passe);
        $user->setCourriel($courriel);
        $user->setAdministrateur($administrateur);

        return $user;
    }

    /**
     * user constructor.
     */
    public function __construct() {
    }

    /**
     * @return mixed
     */
    public function getPkUtilisateur() {
        return $this->pk_utilisateur;
    }

    /**
     * @param mixed $pk_utilisateur
     */
    public function setPkUtilisateur($pk_utilisateur) {
        $this->pk_utilisateur = $pk_utilisateur;
    }

    /**
     * @return mixed
     */
    public function getCourriel() {
        return $this->courriel;
    }

    /**
     * @param mixed $courriel
     */
    public function setCourriel($courriel) {
        $this->courriel = $courriel;
    }

    /**
     * @return mixed
     */
    public function getMotDePasse() {
        return $this->mot_de_passe;
    }

    /**
     * @param mixed $mot_de_passe
     */
    public function setMotDePasse($mot_de_passe) {
        $this->mot_de_passe = $mot_de_passe;
    }

    /**
     * @return mixed
     */
    public function getAdministrateur() {
        return $this->administrateur;
    }

    /**
     * @param mixed $administrateur
     */
    public function setAdministrateur($administrateur) {
        $this->administrateur = $administrateur;
    }



}