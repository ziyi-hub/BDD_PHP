<?php

require_once 'vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
$config = require_once 'src/conf/settings.php';
$db = new DB();
$db->addConnection(parse_ini_file($config['settings']['dbfile']));
$db->setAsGlobal();
$db->bootEloquent();

echo \td1\modele\Game::question1();
echo '</br>';
echo '</br>';

echo \td1\modele\Company::question2();
echo '</br>';

echo '</br>';

echo \td1\modele\Platform::question3();
echo '</br>';
echo '</br>';

echo \td1\modele\Game::question4();
echo '</br>';
echo '</br>';

echo \td1\modele\Game::question5();