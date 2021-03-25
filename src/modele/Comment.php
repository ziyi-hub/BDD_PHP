<?php


namespace td2\modele;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table='comment';
    //protected $fillable = ['title', 'content', 'created_at', 'email'];
    protected $primaryKey='id';
}