<?php

namespace td2\controleur;
use Illuminate\Support\Facades\DB;
use Slim\Container;
use td2\modele\Game;
use td2\vue\VueParticipant;
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
        $liste = Game::query()->paginate(20, ['*']);
        if (!is_null($liste)){
            $vue = new VueParticipant([$liste], $this->c);
            $this->htmlvars['basepath'] = $rq->getUri()->getBasePath();
            $rs->getBody()->write($vue->question2());
        }
        return $rs;
    }


    function getPagination(Request $rq, Response $rs, array $args ):Response{
        $page = $args['page'];
        $liste = Game::query()->paginate(20, ['*'], 'page', $page);
        if (!is_null($liste)){
            $vue = new VueParticipant([$liste], $this->c);
            $this->htmlvars['basepath'] = $rq->getUri()->getBasePath();
            $rs->getBody()->write($vue->question2());
        }
        return $rs;
    }

    function getLienCollection(Request $rq, Response $rs, array $args ):Response{
        $tokenliste = $args['id'];
        $liste = Game::query()->find($tokenliste);
        $array = array("links" => array("self" => array("href" => "/api/games/".$args['id'])));
        array_push($array, $liste);
        if(!is_null($array)) {
            $vue = new VueParticipant([$array], $this->c);
            $this->htmlvars['basepath'] = $rq->getUri()->getBasePath();
            $rs->getBody()->write($vue->question2());
        }
        return $rs;
    }

    function retourGames(Request $rq, Response $rs, array $args ):Response{
        $tokenliste = $args['id'];
        $liste = Game::query()->find($tokenliste);
        $array = array("links" => array(
            "comments" => array("href" => "/api/games/".$args['id']."/comments"),
            "characters" => array("href" => "/api/games/".$args['id']."/characters")
        ));
        array_push($array, $liste);
        if(!is_null($array)) {
            $vue = new VueParticipant([$array], $this->c);
            $this->htmlvars['basepath'] = $rq->getUri()->getBasePath();
            $rs->getBody()->write($vue->question2());
        }
        return $rs;
    }

    public function getComments(Request $rq, Response $rs, array $args):Response
    {
        $id = $args['id'];
        $listeGame = Game::query()->where("id", "=", $id)->get();
        $res = array();
        foreach ($listeGame as $game){
            foreach($game->comments as $comment) {
                $res[] = [
                    'id' => $comment->id,
                    'title' => $comment->title,
                    'content' => $comment->content,
                    'created_at' => $comment->created_at,
                    'created_by' => $comment->created_by,
                ];
            }
        }
        $vue = new VueParticipant([$res], $this->c);
        $this->htmlvars['basepath'] = $rq->getUri()->getBasePath();
        $rs->withHeader("Content-Type", "application/json");
        $rs->getBody()->write($vue->question2());
        return $rs;
    }

}