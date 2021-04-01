<?php

namespace td2\controleur;
use Slim\Container;
use td2\modele\Game;
use td5\vue\VueParticipant;
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;


class ControleurJeu
{
    private $c;
    private $htmlvars;

    public function __construct(Container $c) {
        $this->c = $c;
    }

    function getGame(Request $rq, Response $rs, array $args ):Response {
        $tokenliste = $args['id'];
        $liste = Game::find($tokenliste);
        if(!is_null($liste)) {
            $vue = new VueParticipant([$liste], $this->c);
            $this->htmlvars['basepath'] = $rq->getUri()->getBasePath();
            $rs->getBody()->write($vue->question1());
        }
        return $rs;
    }


    function getCollection(Request $rq, Response $rs, array $args ):Response{
        $liste = Game::all();
        if (!is_null($liste)){
            $vue = new VueParticipant([$liste], $this->c);
            $this->htmlvars['basepath'] = $rq->getUri()->getBasePath();
            $rs->getBody()->write($vue->question2());
        }
        return $rs;
    }


    function getPagination(Request $rq, Response $rs, array $args ):Response{
        $tokenliste = $args['id'];
        $liste = Game::find($tokenliste);
        if(!is_null($liste)) {
            $vue = new VueParticipant([$liste], $this->c);
            $this->htmlvars['basepath'] = $rq->getUri()->getBasePath();
            $rs->getBody()->write($vue->question3());
        }
        return $rs;
    }

    function getLienCollection(Request $rq, Response $rs, array $args ):Response{
        $tokenliste = $args['id'];
        $liste = Game::find($tokenliste);
        $array = array("links" => array("self" => array("href" => "/api/games/".$args['id'])));
        $data = array_merge($liste, $array);
        if(!is_null($data)) {
            $vue = new VueParticipant([$data], $this->c);
            $this->htmlvars['basepath'] = $rq->getUri()->getBasePath();
            $rs->getBody()->write($vue->question2());
        }
        return $rs;
    }



}
