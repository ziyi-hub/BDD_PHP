<?php

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$time = microtime(true);

$config = require_once '../src/conf/settings.php';
$db = new DB();
$db->addConnection(parse_ini_file($config['settings']['dbfile']));
$db->setAsGlobal();
$db->bootEloquent();
DB::connection()->enableQueryLog();

echo "<h2>Partie1</h2>";
$time = microtime(true);
\td2\modele\Game::all();
echo "Ressources1. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";
echo "<br />";


$time = microtime(true);
\td2\modele\Game::query()->select()->where("name", "like", "%Mario%");
echo "Ressources2. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";
echo "<br />";


$time = microtime(true);
$games = \td2\modele\Game::query()->select()->where("name", "like", "Mario%");
foreach ($games as $game){
    $game->character;
}
echo "Ressources3. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";
echo "<br />";


$time = microtime(true);
$games = \td2\modele\Game::query()
    ->select()
    ->where("name", "like", "Mario%");
foreach ($games as $game){
    $game->game_rating->where("name", "like", "%3+%");
}
echo "Ressources4. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";
echo "<br />";



$time = microtime(true);
$game1 = \td2\modele\Game::all()
    ->where("name", "like", "M%");
echo "Index1. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";

$game2 = \td2\modele\Game::all()
    ->where("name", "like", "N%");
echo "Index1. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";

$game3 = \td2\modele\Game::all()
    ->where("name", "like", "S%");
echo "Index1. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";
echo "<br />";


/*
\td2\modele\Game::index();
echo "Index2. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";
echo "<br />";
*/


$time = microtime(true);
$game1 = \td2\modele\Game::all()
    ->where("name", "like", "M%");
echo "Index3. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";

$game2 = \td2\modele\Game::all()
    ->where("name", "like", "N%");
echo "Index3. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";

$game3 = \td2\modele\Game::all()
    ->where("name", "like", "S%");
echo "Index3. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";
echo "<br />";


echo "<h2>Partie2</h2>";
echo "<h3>Ressources1 : </h3>";
\td2\modele\Game::query()->select()->where('name', 'like', '%Mario%')->get();
echo "<br />";
foreach( DB::getQueryLog() as $q){
    echo "-------------- <br />";
    echo "query : " . $q['query'] ."<br />";
    echo " --- bindings : [ ";
    foreach ($q['bindings'] as $b ) {
        echo " ". $b."," ;
    }
    echo " ] ---<br />";
    echo "--------------<br /> <br />";
}
echo "<h3>Ressources1. le nombre de requête est : ".count(DB::getQueryLog())." </h3>";
echo "<br />";
echo "<br />";


echo "<h3>Ressources2 : </h3>";
\td2\modele\Game::question2();
foreach( DB::getQueryLog() as $q){
    echo "-------------- <br />";
    echo "query : " . $q['query'] ."<br />";
    echo " --- bindings : [ ";
    foreach ($q['bindings'] as $b ) {
        echo " ". $b."," ;
    }
    echo " ] ---<br />";
    echo "-------------- <br /> <br />";
};
echo "<h3>Ressources2. le nombre de requête est : ".count(DB::getQueryLog())." </h3>";
echo "<br />";
echo "<br />";


echo "<h3>Ressources3 : </h3>";
\td2\modele\Game::question3();
foreach( DB::getQueryLog() as $q){
    echo "-------------- <br />";
    echo "query : " . $q['query'] ."<br />";
    echo " --- bindings : [ ";
    foreach ($q['bindings'] as $b ) {
        echo " ". $b."," ;
    }
    echo " ] ---<br />";
    echo "-------------- <br /> <br />";
};
echo "<h3>Ressources3. le nombre de requête est : ".count(DB::getQueryLog())." </h3>";
echo "<br />";
echo "<br />";


echo "<h3>Ressources4 : </h3>";
foreach (\td2\modele\Game::question4() as $item){
    echo $item->name;
    echo "<br />";
}
foreach( DB::getQueryLog() as $q){
    echo "-------------- <br />";
    echo "query : " . $q['query'] ."<br />";
    echo " --- bindings : [ ";
    foreach ($q['bindings'] as $b ) {
        echo " ". $b."," ;
    }
    echo " ] ---<br />";
    echo "-------------- <br /> <br />";
};
echo "<h3>Ressources4. le nombre de requête est : ".count(DB::getQueryLog())." </h3>";
echo "<br />";
echo "<br />";


echo "<h3>Ressources5 : </h3>";
foreach( DB::getQueryLog() as $q){
    echo "-------------- <br />";
    echo "query : " . $q['query'] ."<br />";
    echo " --- bindings : [ ";
    foreach ($q['bindings'] as $b ) {
        echo " ". $b."," ;
    }
    echo " ] ---<br />";
    echo "-------------- <br /> <br />";
};
echo "<h3>Ressources5. le nombre de requête est : ".count(DB::getQueryLog())." </h3>";
echo "<br />";
echo "<br />";


echo "<h3>Chargements liés 1: </h3>";
\td2\modele\Game::question6();
foreach( DB::getQueryLog() as $q){
    echo "-------------- <br />";
    echo "query : " . $q['query'] ."<br />";
    echo " --- bindings : [ ";
    foreach ($q['bindings'] as $b ) {
        echo " ". $b."," ;
    }
    echo " ] ---<br />";
    echo "-------------- <br /> <br />";
};
echo "<h3>Chargements liés 1. le nombre de requête est : ".count(DB::getQueryLog())." </h3>";
echo "<br />";
echo "<br />";



echo "<h3>Chargements liés 2: </h3>";
\td2\modele\Game::question7();
foreach( DB::getQueryLog() as $q){
    echo "-------------- <br />";
    echo "query : " . $q['query'] ."<br />";
    echo " --- bindings : [ ";
    foreach ($q['bindings'] as $b ) {
        echo " ". $b."," ;
    }
    echo " ] ---<br />";
    echo "-------------- <br /> <br />";
};
echo "<h3>Chargements liés 2. le nombre de requête est : ".count(DB::getQueryLog())." </h3>";
echo "<br />";
echo "<br />";


