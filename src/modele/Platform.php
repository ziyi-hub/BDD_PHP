<?php


namespace td1\modele;
require_once '../../index.php';

class Platform extends \Illuminate\Database\Eloquent\Model
{
    protected $table='platform';
    protected $primaryKey='id';

    public function question3() {
        return Platform::query()->where("install_base", ">=", "10000000")
            ->get();
    }
}