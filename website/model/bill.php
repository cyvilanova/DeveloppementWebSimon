<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/DeveloppementWebSimon/website/model/client.php";
require_once $_SERVER['DOCUMENT_ROOT'] . "/DeveloppementWebSimon/website/model/facture_service.php";

class bill implements JsonSerializable
{
    private $pk_facture;
    private $fk_client;
    private $date_service;
    private $paiement_status;
    private $no_confirmation;
    private $services;

    public static function load($pk_facture) {
        $result = executeSelect("SELECT * FROM `lab_app_media`.`facture` WHERE `facture`.pk_facture = :pk_facture",
            array(":pk_facture" => $pk_facture));

        $bill = new bill();
        $row = $result->fetch();

        $bill->setPkFacture($pk_facture);
        $bill->setDateService($row["date_service"]);
        $bill->setFkClient(client::load($row["fk_client"]));
        $bill->setNoConfirmation($row["no_confirmation"]);
        $bill->setPaiementStatus($row["paiement_status"]);

        $result->closeCursor();

        $result = executeSelect("SELECT * FROM `lab_app_media`.`ta_facture_service`
                WHERE ta_facture_service.fk_facture = :fk_facture", array(":fk_facture" => $pk_facture));
        $tmpArray = array();


        while ($row = $result->fetch()) {
            array_push($tmpArray, facture_service::load($row["pk_facture_service"]));
        }

        $bill->setServices($tmpArray);

        return $bill;
    }

    public static function create($fk_client, $date_service, $paiement_status, $no_confirmation) {
        $result = executeInsert("INSERT INTO
        `lab_app_media`.`facture`(fk_client, date_service, paiement_status, no_confirmation)
        VALUES (:fk_client, :date_service, :paiement_status, :no_confirmation)", array(":fk_client" => $fk_client,
            ":date_service" => $date_service, ":paiement_status" => (int) $paiement_status,
            ":no_confirmation" => $no_confirmation));

        $bill = new bill();

        $bill->setPkFacture($result);
        $bill->setPaiementStatus($paiement_status);
        $bill->setNoConfirmation($no_confirmation);
        $bill->setFkClient(client::load($fk_client));
        $bill->setDateService($date_service);

        return $bill;
    }

    /**
     * @return mixed
     */
    public function getServices() {
        return $this->services;
    }

    /**
     * @param mixed $services
     */
    public function setServices($services) {
        $this->services = $services;
    }

    /**
     * bill constructor.
     */
    public function __construct() {
    }

    /**
     * @return mixed
     */
    public function getPkFacture() {
        return $this->pk_facture;
    }

    /**
     * @param mixed $fk_facture
     */
    public function setPkFacture($fk_facture) {
        $this->pk_facture = $fk_facture;
    }

    /**
     * @return mixed
     */
    public function getFkClient() {
        return $this->fk_client;
    }

    /**
     * @param mixed $fk_client
     */
    public function setFkClient($fk_client) {
        $this->fk_client = $fk_client;
    }

    /**
     * @return mixed
     */
    public function getDateService() {
        return $this->date_service;
    }

    /**
     * @param mixed $date_service
     */
    public function setDateService($date_service) {
        $this->date_service = $date_service;
    }

    /**
     * @return mixed
     */
    public function getPaiementStatus() {
        return $this->paiement_status;
    }

    /**
     * @param mixed $paiement_status
     */
    public function setPaiementStatus($paiement_status) {
        $this->paiement_status = $paiement_status;
    }

    /**
     * @return mixed
     */
    public function getNoConfirmation() {
        return $this->no_confirmation;
    }

    /**
     * @param mixed $no_confirmation
     */
    public function setNoConfirmation($no_confirmation) {
        $this->no_confirmation = $no_confirmation;
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