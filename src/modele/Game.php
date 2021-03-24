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

    public function firstCharacters(){
        return $this->hasMany(Character::class, "first_appeared_in_game_id");
    }

    public function game_rating(){
        return $this->belongsToMany(Game_rating::class, "game2rating", "rating_id", "game_id");
    }

    public static function index(){
        \Illuminate\Support\Facades\Schema::table("game", function ($table){
            $table->index("name");
        });
    }

    public static function question2(){
        $game = Game::query()->select('name')
            ->where("id", "=", 12342)->get()->first;
        return $game->characters;
    }

    public static function question3(){
        $game = Game::query()->select('id')
            ->where('name', 'like', '%Mario%')->get()->first;
        return $game->firstCharacters;
    }

    public static function question4(){
        $game = Game::query()->select()
            ->where("name", "like", "%Mario%")->get()->first();
        return $game->characters;
    }

    public function company(){
        return $this->belongsToMany(Company::class, "game_developers", "game_id", "comp_id");
    }

    public static function question5() {
        $game = Game::query()->select()
            ->where("name", "like", "%Sony%")->get()->first();
        return $game->company;
    }

    public static function question6() {
        return Game2character::with(["game", "character"])->get()->first();
    }

    public static function question7() {
        return Game_developers::with(["game", "company"])->get()->first();
    }

}