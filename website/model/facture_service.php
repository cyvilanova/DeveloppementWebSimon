<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/DeveloppementWebSimon/website/model/service.php";

class facture_service implements JsonSerializable
{
    private $pk_facture_service;
    private $fk_facture;
    private $service;
    private $tarif_facture;

    public static function load($pk_facture_service) {
        $result = executeSelect("SELECT * FROM `lab_app_media`.ta_facture_service
                                WHERE pk_facture_service = :pk_facture_service",
        array(":pk_facture_service" => $pk_facture_service));

        $facture_service = new facture_service();
        $row = $result->fetch();

        $facture_service->setFkFacture($row["fk_facture"]);
        $facture_service->setPkFactureService($pk_facture_service);
        $facture_service->setService(service::load($row["fk_service"]));
        $facture_service->setTarifFacture($row["tarif_facture"]);

        return $facture_service;
    }

    public static function create($fk_facture, $fk_service, $tarif_facture) {
        $result = executeInsert("INSERT INTO `lab_app_media`.ta_facture_service(fk_facture, fk_service,
                                               tarif_facture) VALUE (:fk_facture, :fk_service, :tarif_facture)",
            array(":fK_facture" => $fk_facture, ":fk_service" => $fk_service, ":tarif_facture" => $tarif_facture));

        $facture_service = new facture_service();

        $facture_service->setPkFactureService($result);
        $facture_service->setTarifFacture($tarif_facture);
        $facture_service->setFkFacture($fk_facture);
        $facture_service->setService($fk_service);

        return $facture_service;
    }

    /**
     * facture_service constructor.
     */
    public function __construct() {
    }

    /**
     * @return mixed
     */
    public function getPkFactureService() {
        return $this->pk_facture_service;
    }

    /**
     * @param mixed $pk_facture_service
     */
    public function setPkFactureService($pk_facture_service) {
        $this->pk_facture_service = $pk_facture_service;
    }

    /**
     * @return mixed
     */
    public function getFkFacture() {
        return $this->fk_facture;
    }

    /**
     * @param mixed $fk_facture
     */
    public function setFkFacture($fk_facture) {
        $this->fk_facture = $fk_facture;
    }

    /**
     * @return mixed
     */
    public function getService() {
        return $this->service;
    }

    /**
     * @param mixed $service
     */
    public function setService($service) {
        $this->service = $service;
    }

    /**
     * @return mixed
     */
    public function getTarifFacture() {
        return $this->tarif_facture;
    }

    /**
     * @param mixed $tarif_facture
     */
    public function setTarifFacture($tarif_facture) {
        $this->tarif_facture = $tarif_facture;
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