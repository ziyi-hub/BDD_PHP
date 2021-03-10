<?php


namespace td1\modele;
require_once '../../index.php';

class Game extends \Illuminate\Database\Eloquent\Model
{
    protected $table='game';
    protected $primaryKey='id';

    public function question1() {
        return Game::query()->where("name", "like", "%Mario")
            ->get();
    }

    public function question4() {
        return Game::query()->where("id", ">=", "21173")->limit(442)
            ->get();
    }

    public function question5(){

    }
}