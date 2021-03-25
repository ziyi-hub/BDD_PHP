<?php

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;

$time = microtime(true);

$config = require_once '../src/conf/settings.php';
$db = new DB();
$db->addConnection(parse_ini_file($config['settings']['dbfile']));
$db->setAsGlobal();
$db->bootEloquent();

$user1 = \td2\modele\User::query()->insert([
    "email" => "user1@email",
    "nom" => "nomUser1",
    "prenom" => "prenomUser1",
    "adresse" => "adresseUse12",
    "tel" => "0687654321",
    "dateNais" => "2000-12-12"
]);

$user2 = \td2\modele\User::query()->insert([
        "email" => "user2@email",
        "nom" => "nomUser2",
        "prenom" => "prenomUser2",
        "adresse" => "adresseUser2",
        "tel" => "0687654321",
        "dateNais" => "2001-02-12"
]);

$comment1 = \td2\modele\Comment::query()->insert([
        "title" => "title1",
        "content" => "content1",
        "created_by" => "user1@email"
]);

$comment2 = \td2\modele\Comment::query()->insert([
    "title" => "title2",
    "content" => "content2",
    "created_by" => "user1@email"
]);

$comment3 = \td2\modele\Comment::query()->insert([
    "title" => "title3",
    "content" => "content3",
    "created_by" => "user1@email"
]);

$comment4 = \td2\modele\Comment::query()->insert([
    "title" => "title4",
    "content" => "content4",
    "created_by" => "user2@email"
]);

$comment5 = \td2\modele\Comment::query()->insert([
    "title" => "title5",
    "content" => "content5",
    "created_by" => "user2@email"
]);

$comment6 = \td2\modele\Comment::query()->insert([
    "title" => "title6",
    "content" => "content6",
    "created_by" => "user2@email"
]);




