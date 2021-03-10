<?php


namespace td1\modele;
require_once '../../index.php';

class Company extends \Illuminate\Database\Eloquent\Model
{
    protected $table='company';
    protected $primaryKey='id';
}