<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/website/utils/statement_executor.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/website/model/address.php";
require_once $_SERVER['DOCUMENT_ROOT'] ."/website/model/user.php";

class client implements JsonSerializable
{
    private $pk_client;
    private $fk_utilisateur;
    private $fk_addresse;
    private $prenom;
    private $nom;
    private $telephone;
    private $infolettre;

    public static function load($pk_client) {
        $result = executeSelect("SELECT * FROM `lab_app_media`.`client`
        WHERE `client`.`pk_client` = :pk_client", array(":pk_client" => $pk_client));

        $client = new client();
        $row = $result->fetch();

        $client->setPkClient($pk_client);
        $client->setFkAddresse(address::load($row["fk_adresse"]));
        $client->setFkUtilisateur(user::load($row["fk_utilisateur"]));
        $client->setInfolettre($row["infolettre"]);
        $client->setNom($row["nom"]);
        $client->setPrenom($row["prenom"]);
        $client->setTelephone($row["telephone"]);

        $result->closeCursor();

        return $client;
    }

    public static function create($fk_addresse, $fk_utilisateur, $infolettre, $nom, $prenom, $telephone) {
        $result = executeInsert("INSERT INTO `lab_app_media`.`client`(fk_utilisateur, prenom, nom,
                                     fk_adresse, telephone, infolettre)
                                     VALUE (:fk_utilisateur, :prenom, :nom, :fk_adresse, :telephone, :infolettre)",
            array(":fk_utilisateur" => $fk_utilisateur, ":prenom" => $prenom, ":nom" => $nom,
                ":fk_adresse" => $fk_addresse, ":telephone" => $telephone, ":infolettre" => (int) $infolettre));


        $client = new client();

        $client->setPkClient($result);
        $client->setTelephone($telephone);
        $client->setPrenom($prenom);
        $client->setInfolettre($infolettre);
        $client->setNom($nom);
        $client->setFkUtilisateur(user::load($fk_utilisateur));
        $client->setFkAddresse(address::load($fk_addresse));

        return $client;
    }

    /**
     * promotion constructor.
     */
    public function __construct() {
    }

    /**
     * @return mixed
     */
    public function getPkClient() {
        return $this->pk_client;
    }

    /**
     * @param mixed $pk_client
     */
    public function setPkClient($pk_client) {
        $this->pk_client = $pk_client;
    }

    /**
     * @return mixed
     */
    public function getFkUtilisateur() {
        return $this->fk_utilisateur;
    }

    /**
     * @param mixed $fk_utilisateur
     */
    public function setFkUtilisateur($fk_utilisateur) {
        $this->fk_utilisateur = $fk_utilisateur;
    }

    /**
     * @return mixed
     */
    public function getFkAddresse() {
        return $this->fk_addresse;
    }

    /**
     * @param mixed $fk_addresse
     */
    public function setFkAddresse($fk_addresse) {
        $this->fk_addresse = $fk_addresse;
    }

    /**
     * @return mixed
     */
    public function getPrenom() {
        return $this->prenom;
    }

    /**
     * @param mixed $prenom
     */
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    /**
     * @return mixed
     */
    public function getNom() {
        return $this->nom;
    }

    /**
     * @param mixed $nom
     */
    public function setNom($nom) {
        $this->nom = $nom;
    }

    /**
     * @return mixed
     */
    public function getTelephone() {
        return $this->telephone;
    }

    /**
     * @param mixed $telephone
     */
    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }

    /**
     * @return mixed
     */
    public function getInfolettre() {
        return $this->infolettre;
    }

    /**
     * @param mixed $infolettre
     */
    public function setInfolettre($infolettre) {
        $this->infolettre = $infolettre;
    }

    /**
     * Specify data which should be serialized to JSON
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     * @return mixed data which can be serialized by <b>json_encode</b>,
     * which is a value of any type other than a resource.
     * @since 5.4.0
     */
    public function jsonSerialize() {
        return get_object_vars($this);
    }
}