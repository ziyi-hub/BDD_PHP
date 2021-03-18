<?php


namespace td2\modele;
use td2\modele\Character;
use td2\modele\Game_rating;
use td2\modele\Rating_board;
use td2\modele\Genre;
class Game extends \Illuminate\Database\Eloquent\Model
{
    protected $table='game';
    protected $primaryKey='id';
}