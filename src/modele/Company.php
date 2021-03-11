<?php


namespace td1\modele;

class Company extends \Illuminate\Database\Eloquent\Model
{
    protected $table='company';
    protected $primaryKey='id';

    public static function question2() {
        return Company::query()->where("location_country", "like", "Japan")
            ->get();
    }
}