<?php


namespace td1\modele;

class Game extends \Illuminate\Database\Eloquent\Model
{
    protected $table='game';
    protected $primaryKey='id';

    public static function question1() {
        return Game::query()->select('name')->where("name", "like", "%Mario")
            ->get();
    }

    public static function question4() {
        return Game::query()->select('name')->where("id", ">=", "21173")->limit(442)
            ->get();
    }

    public static function question5(){
        return Game::query()->select('name', 'deck')->paginate(500)->get();
    }
}