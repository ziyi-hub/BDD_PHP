<?php

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as DB;
use td2\modele\User;
use td2\modele\Comment;

$time = microtime(true);

$config = require_once '../src/conf/settings.php';
$db = new DB();
$db->addConnection(parse_ini_file($config['settings']['dbfile']));
$db->setAsGlobal();
$db->bootEloquent();

$user1 = new User();
$user1->email = "user1@email";
$user1->nom = "nomUser1";
$user1->prenom = "prenomUser1";
$user1->adresse = "adresseUser1";
$user1->tel = "0612345678";
$user1->dateNais = "12/12/2000";

$user1->save();

/*
$user2 = new User(
    [
        "email" => "user2@email",
        "nom" => "nomUser2",
        "prenom" => "prenomUser2",
        "adresse" => "adresseUser2",
        "tel" => "0687654321",
        "dateNais" => "10/02/2001"
    ]
);

$comment1 = new Comment(
    [
        "title" => "title1",
        "content" => "content1",
        "email" => "user1@email"
    ]
);

$comment2 = new Comment(
    [
        "title" => "title2",
        "content" => "content2",
        "email" => "user1@email"
    ]
);

$comment3 = new Comment(
    [
        "title" => "title3",
        "content" => "content3",
        "email" => "user1@email"
    ]
);


$comment4 = new Comment(
    [
        "title" => "title4",
        "content" => "content4",
        "email" => "user2@email"
    ]
);


$comment5 = new Comment(
    [
        "title" => "title5",
        "content" => "content5",
        "email" => "user2@email"
    ]
);


$comment6 = new Comment(
    [
        "title" => "title6",
        "content" => "content6",
        "email" => "user2@email"
    ]
);

$user1->save();
$user2->save();
$comment1->save();
$comment2->save();
$comment3->save();
$comment4->save();
$comment5->save();
$comment6->save();


echo '</br>';
echo '</br>';
*/



