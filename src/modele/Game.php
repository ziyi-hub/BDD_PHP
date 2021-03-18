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

    public static function question2(){
        $game = Game::query()->select()
            ->where("name", "like", "Mario%")->firstOr();
        return $game->characters;
    }

    public function company(){
        return $this->belongsToMany(Company::class, "game_developers", "game_id", "comp_id");
    }

    public static function question3() {
        $game = Game::query()->select()
            ->where("name", "like", "%Sony%")->get()->first;
        return $game->company;
    }

    public function game_rating(){
        return $this->belongsToMany(Game_rating::class, "game2rating", "rating_id", "game_id");
    }

    public function rating_board(){
        return $this->belongsToMany(Rating_board::class, 'game2rating', "rating_id", "game_id");
    }

    public static function question4(){
        $game = Game::query()->select()
            ->where("name", "like", "%Mario%")->get()->first;
        $game2 = $game->game_rating;
        $game2->rating_board;
    }

    public static function question5(){
        $count = \td2\modele\Character::query()->count("id");
        $game = Game::query()->select()
            ->where("name", "like", "Mario%")
            ->havingRaw("$count > 3")
            ->get()->first;
        return $game->characters;
    }

    public static function question6(){
        $game = Game::query()->select()
            ->where("game.name", "like", "Mario%")
            ->where(Game_rating::query()->select("name"), "like", "%3+%")->get()->first;
        return $game->game_rating;
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