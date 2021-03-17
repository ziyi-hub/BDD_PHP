<?php


namespace td2\modele;
use td2\modele\Character;
use td2\modele\Game_rating;
use td2\modele\Rating_board;
use td2\modele\Genre;
use function React\Promise\all;

class Game extends \Illuminate\Database\Eloquent\Model
{
    protected $table='game';
    protected $primaryKey='id';
    protected $fillable = ["id"];

    public function characters(){
        return $this->belongsToMany(Character::class, "game2character", "game_id", "character_id");
    }

    public static function question1(){
        $game = Game::query()->select('name','deck')
        ->where("id", "=", 12342)->get()->first;
        return $game->characters;
    }

    public static function question4(){
        return Game::query()
            ->where("name", "like", "%Mario%")
            ->belongsToMany(Game_rating::class, "game2rating", "rating_id", "game_id")
            ->hasMany(Rating_board::class, 'rating_board_id');
    }

    public static function question5(){
        return Game::query()
            ->where("name", "like", "Mario%")
            ->havingRaw("count(character_id) > 3")
            ->belongsToMany(Character::class, "game2character", "game_id", "character_id");
    }

    public static function question6(){
        return Game::query()
            ->where("game.name", "like", "Mario%")
            ->where("game_rating.name", "like", "%3+%")
            ->belongsToMany(Game_rating::class, "game2rating", "rating_id", "game_id");
    }

    public static function question7(){
        return Game::query()
            ->where("game.name", "like", "Mario%")
            ->where("company.name", "like", "%Inc%")
            ->where("game_rating.name", "like", "%3+%")
            ->belongsToMany(Company::class, "game_publishers", "comp_id", "game_id")
            ->belongsToMany(Game_rating::class, "game2rating", "rating_id", "game_id");
    }

    public static function question8(){
        return Game::query()
            ->where("game.name", "like", "Mario%")
            ->where("company.name", "like", "%Inc%")
            ->where("game_rating.name", "like", "%3+%")
            ->where("rating_board.name", "=", "CERO")
            ->belongsToMany(Company::class, "game_publishers", "comp_id", "game_id")
            ->belongsToMany(Game_rating::class, "game2rating", "rating_id", "game_id")
            ->hasMany(Rating_board::class, 'rating_board_id');
    }

    public static function question9(){
        $genre = new Genre();
        $genre->name = "NomGenre";
        $genre->save();
        $geme2Genre = new Game2genre();
        $geme2Genre->game_id = 12;
        $geme2Genre->genre_id = $genre->id;

        $geme2Genre = new Game2genre();
        $geme2Genre->game_id = 56;
        $geme2Genre->genre_id = $genre->id;

        $geme2Genre = new Game2genre();
        $geme2Genre->game_id = 345;
        $geme2Genre->genre_id = $genre->id;
    }

}