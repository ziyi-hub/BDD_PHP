<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
$config = require_once 'src/conf/settings.php';
$db = new DB();
$db->addConnection(parse_ini_file($config['settings']['dbfile']));
$db->setAsGlobal();
$db->bootEloquent();

echo \td2\modele\Game::question1();
echo '</br>';
echo '</br>';

echo \td2\modele\Game::question2();
echo '</br>';
echo '</br>';

echo \td2\modele\Game::question3();
echo '</br>';
echo '</br>';
