<?php


namespace td2\modele;
use Illuminate\Database\Eloquent\Model;

class Game_developers extends Model
{
    protected $table='game_developers';

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function company(){
        return $this->belongsTo(Company::class);
    }
}