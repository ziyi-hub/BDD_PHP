<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$time = microtime(true);

$config = require_once 'src/conf/settings.php';
$db = new DB();
$db->addConnection(parse_ini_file($config['settings']['dbfile']));
$db->setAsGlobal();
$db->bootEloquent();

echo "Partie 1<br/>";
echo "1. Temps d'execution (connexion à la base): ".(microtime(true)-$time)." secondes";
