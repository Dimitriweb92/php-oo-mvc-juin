<?php
/**
 * Classe enfant de la classe native PDO
 */

class ConnectPDO
{
    private $connect;

    /**
     * ConnectPDO constructor.
     */
    public function __construct($type,$host,$name,$port,$login,$pwd,$charset,$mode='dev')
    {

        try {

            $this->connect = new PDO($type . ":host=" . $host . ";dbname=" . $name . ";PORT=" . $port . ";charset=" . $charset, $login, $pwd,$persist=false);
            if ($mode == 'dev') {
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            if ($persist){
                $this->connect->setAttribute(PDO::ATTR_PERSISTENT);
            }

            return $this->connect;

        } catch (PDOException $e) {

            echo "Erreur: " . $e->getMessage();
            echo "<br>";
            echo "n° " . $e->getCode();
            die();

        }


    }
}