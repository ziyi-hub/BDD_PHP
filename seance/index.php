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
echo "1. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";
echo "<br />";


$time = microtime(true);
\td2\modele\Game::query()->select()->where("name", "like", "%Mario%");
echo "2. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";
echo "<br />";


$time = microtime(true);
$games = \td2\modele\Game::query()->select()->where("name", "like", "Mario%");
foreach ($games as $game){
    $game->character;
}
echo "3. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";
echo "<br />";


$time = microtime(true);
$games = \td2\modele\Game::query()
    ->select()
    ->where("name", "like", "Mario%");
foreach ($games as $game){
    $game->game_rating->where("name", "like", "%3+%");
}
echo "4. Temps d'execution : ".(microtime(true)-$time)." secondes";
echo "<br />";
echo "<br />";

