<?php


namespace td2\modele;
use td2\modele\Game;

class Company extends \Illuminate\Database\Eloquent\Model
{
    protected $table='company';
    protected $primaryKey='id';

    public static function question3() {
        return Game::query()->select()
            ->where("name", "like", "%Sony%")
            ->belongsToMany(Game::class, "geme_developers", "game_id", "comp_id");
    }
}
