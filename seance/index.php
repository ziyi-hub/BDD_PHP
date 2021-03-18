<?php

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$time = microtime(true);

$config = require_once '../src/conf/settings.php';
$db = new DB();
$db->addConnection(parse_ini_file($config['settings']['dbfile']));
$db->setAsGlobal();
$db->bootEloquent();

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



\td2\modele\Game::index();
echo "Index2. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";
echo "<br />";



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


