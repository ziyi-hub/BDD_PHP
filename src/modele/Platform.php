<?php


namespace td1\modele;

class Platform extends \Illuminate\Database\Eloquent\Model
{
    protected $table='platform';
    protected $primaryKey='id';

    public static function question3() {
        return Platform::query()->select('name')->where("install_base", ">=", "10000000")
            ->get();
    }
}