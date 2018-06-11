<?php

// dépendences
require_once "config.php";

// create autoload

spl_autoload_register(function ($nom_classe){
    require_once "Model/$nom_classe.php";

});

// connexion PDO
$db = new ConnectPDO(DB_TYPE,DB_HOST,DB_NAME,DB_PORT,DB_LOGIN,DB_PWD,DB_CHARSET);