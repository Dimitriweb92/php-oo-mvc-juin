<?php

class ConnectPDO
{

    private $connect;



    public function __construct($type,$host,$name,$port,$login,$pwd,$charset="utf8",$mode='dev',$persist=false)
    {
        try {
            $this->connect = new PDO($type . ":host=" . $host . ";dbname=" . $name . ";port=" . $port . ";charset=" . $charset, $login, $pwd);

            // Affichage des erreurs en mode "dev", plus en mode "prod"
            if($mode=="dev") {
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }

            // si on veut une connexion permanente
            if($persist) {

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