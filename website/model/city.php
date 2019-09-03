<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/website/utils/statement_executor.php";

class city implements JsonSerializable
{

    private $pk_ville;
    private $ville;

    public static function load($ville_id) {

        $result = executeSelect("SELECT `lab_app_media`.`ville`.ville FROM `lab_app_media`.`ville`
        WHERE `ville`.pk_ville = :pk_ville", array(":pk_ville" => $ville_id));


        $city = new city();
        $row = $result->fetch();

        $city->setVille($row["ville"]);
        $city->setPkVille($ville_id);

        $result->closeCursor();

        return $city;
    }

    /**
     * city constructor.
     */
    public function __construct() {}


    /**
     * @return mixed
     */
    public function getPkVille() {
        return $this->pk_ville;
    }

    /**
     * @param mixed $pk_ville
     */
    public function setPkVille($pk_ville) {
        $this->pk_ville = $pk_ville;
    }

    /**
     * @return mixed
     */
    public function getVille() {
        return $this->ville;
    }

    /**
     * @param mixed $ville
     */
    public function setVille($ville) {
        $this->ville = $ville;
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