<?php


namespace td2\modele;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table='user';
    //protected $fillable = ['email', 'nom', 'prenom', 'adresse', 'tel', 'dateNais'];
    protected $primaryKey='email';
}