<?php


namespace td2\modele;
use Illuminate\Database\Eloquent\Model;

class Game2character extends Model
{
    protected $table='game2character';

    public function game()
    {
        return $this->belongsTo(Game::class);
    }

    public function character(){
        return $this->belongsTo(Character::class);
    }
}