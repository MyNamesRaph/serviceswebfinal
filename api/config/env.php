<?php 

// Constante du mode de l'application
// dev : variables utilisées en local
// prod : pour le déploiement de l'api en production
define("MODE", "dev");

$config = json_decode(file_get_contents("databaseConfig.json"),true);

switch (MODE) {
    case "dev":
        // Configuration BD en local
        $_ENV['host'] = $config['dev']['host']; 
        $_ENV['username'] = $config['dev']['username']; 
        $_ENV['database'] = $config['dev']['database']; 
        $_ENV['password'] = $config['dev']['password'];
        break;

    case "prod":
        // Configuration BD pour Heroku
        $_ENV['host'] = $config['prod']['host'];
        $_ENV['username'] = $config['prod']['username'];
        $_ENV['database'] = $config['prod']['database'];
        $_ENV['password'] = $config['prod']['password'];
        break;
};