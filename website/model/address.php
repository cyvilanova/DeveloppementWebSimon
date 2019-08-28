<?php

require_once $_SERVER['DOCUMENT_ROOT'] ."/website/model/city.php";

class address
{
    private $pk_addresse;
    private $no_civique;
    private $rue;
    private $ville;
    private $code_postal;

    public static function load($pk_addresse) {
        $result = executeSelect("SELECT * FROM `lab_app_media`.`adresse`
        WHERE `adresse`.pk_adresse = :pk_addresse", array(":pk_addresse" => $pk_addresse));


        $address = new address();
        $row = $result->fetch();

        $address->setVille(city::load($row["fk_ville"]));
        $address->setCodePostal($row["code_postal"]);
        $address->setNoCivique($row["no_civique"]);
        $address->setRue($row["rue"]);
        $address->setPkAddresse($pk_addresse);

        $result->closeCursor();

        return $address;
    }

    public static function create($no_civique, $rue, $fk_ville, $code_postal) {

        $result = executeInsert("INSERT INTO `lab_app_media`.`adresse`(no_civique, rue, fk_ville, code_postal)
        VALUE (:no_civique, :rue, :fk_ville, :code_postal)", array(":no_civique" => $no_civique, ":rue" => $rue,
            ":fk_ville" => $fk_ville, ":code_postal" => $code_postal));

        $address = new address();

        $address->setPkAddresse($result);
        $address->setRue($rue);
        $address->setNoCivique($no_civique);
        $address->setCodePostal($code_postal);
        $address->setVille(city::load($fk_ville));

        return $address;
    }

    /**
     * address constructor.
     */
    public function __construct() {
    }


    /**
     * @return mixed
     */
    public function getPkAddresse() {
        return $this->pk_addresse;
    }

    /**
     * @param mixed $pk_addresse
     */
    public function setPkAddresse($pk_addresse) {
        $this->pk_addresse = $pk_addresse;
    }

    /**
     * @return mixed
     */
    public function getNoCivique() {
        return $this->no_civique;
    }

    /**
     * @param mixed $no_civique
     */
    public function setNoCivique($no_civique) {
        $this->no_civique = $no_civique;
    }

    /**
     * @return mixed
     */
    public function getRue() {
        return $this->rue;
    }

    /**
     * @param mixed $rue
     */
    public function setRue($rue) {
        $this->rue = $rue;
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
     * @return mixed
     */
    public function getCodePostal() {
        return $this->code_postal;
    }

    /**
     * @param mixed $code_postal
     */
    public function setCodePostal($code_postal) {
        $this->code_postal = $code_postal;
    }



}