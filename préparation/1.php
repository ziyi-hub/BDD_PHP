<?php
/**
 * File:  1.php
 * Creation Date: 04/01/2016
 * description:
 *
 * @author: canals
 */

require '../vendor/autoload.php';

use td2\modele\Game;

use Illuminate\Database\Capsule\Manager as DB;


/**
 *   configurer la connexion à la base  ...
 */
$config = require_once '../src/conf/settings.php';
$db = new DB();
$db->addConnection(parse_ini_file($config['settings']['dbfile']));
$db->setAsGlobal();
$db->bootEloquent();

/*
 * logging des requêtes
 * activer le logging
 * exécuter les requêtes
 * afficher le log
 */

DB::connection()->enableQueryLog();

/**
 *  les jeux dont le nom contient Mario
 */

Game::where('name', 'like', '%Mario%')->get();

/*
 * nom des persos du jeu 12342
 */

foreach (Game::find(12342)->characters as $c)
    echo "- perso : " . $c->name ."\n";


/**
 * affichage du log de requêtes
 */

foreach( DB::getQueryLog() as $q){
    echo "-------------- \n";
    echo "query : " . $q['query'] ."\n";
    echo " --- bindings : [ ";
    foreach ($q['bindings'] as $b ) {
        echo " ". $b."," ;
    }
    echo " ] ---\n";
    echo "-------------- \n \n";
};
