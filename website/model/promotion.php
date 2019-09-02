<?php

require_once $_SERVER['DOCUMENT_ROOT'] . "/website/utils/statement_executor.php";

class promotion
{
    private $pk_promotion;
    private $promotion_titre;
    private $promotion_description;
    private $rabais;
    private $image;

    public static function load($pk_promotion) {
        $result = executeSelect("SELECT * FROM `lab_app_media`.`promotion` WHERE pk_promotion = :pk_promotion",
        array(":pk_promotion" => $pk_promotion));

        $promotion = new promotion();
        $row = $result->fetch();

        $promotion->setPkPromotion($pk_promotion);
        $promotion->setImage($row["image"]);
        $promotion->setPromotionDescription($row["promotion_description"]);
        $promotion->setPromotionTitre($row["promotion_titre"]);
        $promotion->setRabais($row["rabais"]);

        $result->closeCursor();

        return $promotion;
    }

    public static function create($promotion_titre, $promotion_description, $rabais, $image) {
        $result = executeInsert("INSERT INTO `lab_app_media`.`promotion`(promotion_titre, promotion_description,
                                        rabais, image) VALUES (:promotion_titre, :promotion_description, :rabais, :image)",
        array(":promotion_titre" => $promotion_titre, ":promotion_description" => $promotion_description,
            ":rabais" => $rabais, ":image" => $image));

        $promotion = new promotion();

        $promotion->setPkPromotion($result);
        $promotion->setRabais($rabais);
        $promotion->setPromotionTitre($promotion_titre);
        $promotion->setPromotionDescription($promotion_description);
        $promotion->setImage($image);

        return $promotion;
    }

    /**
     * promotion constructor.
     */
    public function __construct() {
    }

    /**
     * @return mixed
     */
    public function getPkPromotion() {
        return $this->pk_promotion;
    }

    /**
     * @param mixed $pk_promotion
     */
    public function setPkPromotion($pk_promotion) {
        $this->pk_promotion = $pk_promotion;
    }

    /**
     * @return mixed
     */
    public function getPromotionTitre() {
        return $this->promotion_titre;
    }

    /**
     * @param mixed $promotion_titre
     */
    public function setPromotionTitre($promotion_titre) {
        $this->promotion_titre = $promotion_titre;
    }

    /**
     * @return mixed
     */
    public function getPromotionDescription() {
        return $this->promotion_description;
    }

    /**
     * @param mixed $promotion_description
     */
    public function setPromotionDescription($promotion_description) {
        $this->promotion_description = $promotion_description;
    }

    /**
     * @return mixed
     */
    public function getRabais() {
        return $this->rabais;
    }

    /**
     * @param mixed $rabais
     */
    public function setRabais($rabais) {
        $this->rabais = $rabais;
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