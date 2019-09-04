<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/DeveloppementWebSimon/website/model/service.php";


class promotion_service implements JsonSerializable
{
    private $pk_promotion_service;
    private $fk_promotion;
    private $fk_service;
    private $date_debut;
    private $date_fin;
    private $code;


    public static function load($fk_promotion, $fk_service) {
        $result = executeSelect("SELECT * FROM `lab_app_media`.ta_promotion_service
                                WHERE fk_promotion = :fk_promotion AND fk_service = :fk_service",
                                array(":fk_promotion" => $fk_promotion, ":fk_service" => $fk_service));

        $promotion_service = new promotion_service();
        $row = $result->fetch();

        $promotion_service->setCode($row["code"]);
        $promotion_service->setDateDebut($row["date_debut"]);
        $promotion_service->setDateFin($row["date_fin"]);
        $promotion_service->setPkPromotionService($row["pk_promotion_service"]);
        $promotion_service->setFkPromotion($fk_promotion);
        $promotion_service->setFkService($fk_service);

        $result->closeCursor();

        return $promotion_service;
    }

    public static function create($fk_promotion, $fk_service, $date_debut, $date_fin, $code) {
        $result = executeInsert("INSERT INTO `lab_app_media`.ta_promotion_service(fk_promotion, fk_service,
                                                 date_debut, date_fin, code) VALUES
                                                 (:fk_promotion, :fk_service, :date_debut,
                                                 :date_fin, :code)",
                               array(":fk_promotion" => $fk_promotion, ":fk_service" => $fk_service, ":date_debut" => $date_debut,
                                   ":date_fin" => $date_fin, ":code" => $code));

        $promotion_service = new promotion_service();

        $promotion_service->setPkPromotionService($result);
        $promotion_service->setFkService(service::load($fk_service));
        $promotion_service->setFkPromotion(promotion::load($fk_promotion));
        $promotion_service->setDateFin($date_fin);
        $promotion_service->setDateDebut($date_debut);
        $promotion_service->setCode($code);

        return $promotion_service;
    }

    public static function loadWithPk($pk_promotion_service) {
        $result = executeSelect("SELECT * FROM `lab_app_media`.ta_promotion_service
                                WHERE pk_promotion_service = :pk_promotion_service",
            array(":pk_promotion_service" => $pk_promotion_service));

        $promotion_service = new promotion_service();
        $row = $result->fetch();


        $promotion_service->setPkPromotionService($pk_promotion_service);
        $promotion_service->setCode($row["code"]);
        $promotion_service->setDateDebut($row["date_debut"]);
        $promotion_service->setDateFin($row["date_fin"]);
        $promotion_service->setFkPromotion($row["fk_promotion"]);
        $promotion_service->setFkService($row["fk_service"]);

        $result->closeCursor();

        return $promotion_service;
    }

    public function __construct() {}

    /**
     * @return mixed
     */
    public function getPkPromotionService() {
        return $this->pk_promotion_service;
    }

    /**
     * @param mixed $pk_promotion_service
     */
    public function setPkPromotionService($pk_promotion_service) {
        $this->pk_promotion_service = $pk_promotion_service;
    }

    /**
     * @return mixed
     */
    public function getFkPromotion() {
        return $this->fk_promotion;
    }

    /**
     * @param mixed $fk_promotion
     */
    public function setFkPromotion($fk_promotion) {
        $this->fk_promotion = $fk_promotion;
    }

    /**
     * @return mixed
     */
    public function getFkService() {
        return $this->fk_service;
    }

    /**
     * @param mixed $fk_service
     */
    public function setFkService($fk_service) {
        $this->fk_service = $fk_service;
    }

    /**
     * @return mixed
     */
    public function getDateDebut() {
        return $this->date_debut;
    }

    /**
     * @param mixed $date_debut
     */
    public function setDateDebut($date_debut) {
        $this->date_debut = $date_debut;
    }

    /**
     * @return mixed
     */
    public function getDateFin() {
        return $this->date_fin;
    }

    /**
     * @param mixed $date_fin
     */
    public function setDateFin($date_fin) {
        $this->date_fin = $date_fin;
    }

    /**
     * @return mixed
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * @param mixed $code
     */
    public function setCode($code) {
        $this->code = $code;
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