<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/website/utils/statement_executor.php";

class service
{
    private $pk_service;
    private $service_titre;
    private $service_description;
    private $duree;
    private $tarif;
    private $actif;
    private $image;

    public static function load($pk_service) {
        $result = executeSelect("SELECT * FROM `lab_app_media`.service WHERE `service`.pk_service = :pk_service",
            array(":pk_service" => $pk_service));

        $service = new service();
        $row = $result->fetch();

        $service->setPkService($pk_service);
        $service->setServiceTitre($row["service_titre"]);
        $service->setServiceDescription($row["service_description"]);
        $service->setDuree($row["duree"]);
        $service->setTarif($row["tarif"]);
        $service->setActif($row["actif"]);
        $service->setImage($row["image"]);

        $result->closeCursor();

        return $service;
    }

    public static function create($service_titre, $service_description, $duree, $tarif, $actif, $image) {
        $result = executeInsert("INSERT INTO `lab_app_media`.`service`(service_titre, service_description,
                                      duree, tarif, actif, image)
                                VALUES (:service_titre, :service_description, :duree, :tarif, :actif, :image)",
                                array(":service_titre" => $service_titre, ":service_description" => $service_description,
                                    ":duree" => $duree, ":tarif" => $tarif, ":actif" => $actif, ":image" => $image));

        $service = new service();

        $service->setPkService($result);
        $service->setImage($image);
        $service->setTarif($tarif);
        $service->setDuree($duree);
        $service->setServiceDescription($service_description);
        $service->setServiceTitre($service_titre);
        $service->setActif($actif);

        return $service;
    }



    /**
     * service constructor.
     */
    public function __construct() {
    }

    /**
     * @return mixed
     */
    public function getPkService() {
        return $this->pk_service;
    }

    /**
     * @param mixed $pk_service
     */
    public function setPkService($pk_service) {
        $this->pk_service = $pk_service;
    }

    /**
     * @return mixed
     */
    public function getServiceTitre() {
        return $this->service_titre;
    }

    /**
     * @param mixed $service_titre
     */
    public function setServiceTitre($service_titre) {
        $this->service_titre = $service_titre;
    }

    /**
     * @return mixed
     */
    public function getServiceDescription() {
        return $this->service_description;
    }

    /**
     * @param mixed $service_description
     */
    public function setServiceDescription($service_description) {
        $this->service_description = $service_description;
    }

    /**
     * @return mixed
     */
    public function getDuree() {
        return $this->duree;
    }

    /**
     * @param mixed $duree
     */
    public function setDuree($duree) {
        $this->duree = $duree;
    }

    /**
     * @return mixed
     */
    public function getTarif() {
        return $this->tarif;
    }

    /**
     * @param mixed $tarif
     */
    public function setTarif($tarif) {
        $this->tarif = $tarif;
    }

    /**
     * @return mixed
     */
    public function getActif() {
        return $this->actif;
    }

    /**
     * @param mixed $actif
     */
    public function setActif($actif) {
        $this->actif = $actif;
    }

    /**
     * @return mixed
     */
    public function getImage() {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image) {
        $this->image = $image;
    }

}