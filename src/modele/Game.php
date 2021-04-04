<?php


namespace td2\modele;
use mysql_xdevapi\Schema;
use td2\modele\Character;
use td2\modele\Game_rating;
use td2\modele\Rating_board;
use td2\modele\Genre;
class Game extends \Illuminate\Database\Eloquent\Model
{
    protected $table='game';
    protected $primaryKey='id';

    public function characters(){
        return $this->belongsToMany(Character::class, "game2character", "game_id", "character_id");
    }

    public function game_rating(){
        return $this->belongsToMany(Game_rating::class, "game2rating", "rating_id", "game_id");
    }

    public static function index(){
        \Illuminate\Support\Facades\Schema::table("game", function ($table){
            $table->index("name");
        });
    }

    public function comments(){
        return $this->hasMany(Comment::class, "game_id");
    }
}