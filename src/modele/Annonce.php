<?php

namespace td2\modele;
use Illuminate\Database\Eloquent\Model;
use td2\modele\Photo as Photo;

class Annonce extends Model
{
    protected $table='annonce';
    protected $primaryKey='idAnnonce';

    public function photo(){
        return $this->hasMany(Photo::class, 'idAnnonce');
    }

}