<?php

require_once __DIR__ . '/vendor/autoload.php';
use Illuminate\Database\Capsule\Manager as DB;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
use td2\controleur\ControleurJeu;

$db = new DB();
$config= parse_ini_file("src/conf/conf.ini");
$db->addConnection($config);
$db->setAsGlobal();
$db->bootEloquent();

$config = require_once './src/conf/settings.php';
$c = new \Slim\Container($config);
$app = new \Slim\App($c);

$app->get('/', function (Request $rq, Response $rs, array $args):Response{
    $control = new ControleurJeu($this);
    return $control->getCollection($rq, $rs, $args);
    }
);

$app->get('/{id}', function (Request $rq, Response $rs, array $args):Response{
    $control = new ControleurJeu($this);
    //return $control->getGame($rq, $rs, $args);
    return $control->getLienCollection($rq, $rs, $args);
    }
);

$app->get('?page={id}', function (Request $rq, Response $rs, array $args):Response{
    $control = new ControleurJeu($this);
    return $control->getPagination($rq, $rs, $args);
    }
);

$app->get("/api/games/{id}/comments", function (Request $rq, Response $rs, array $args):Response{
    $control = new ControleurJeu($this);
    return $control->getComments($rq, $rs, $args);
});

$app->run();






