<?php

require_once '../vendor/autoload.php';

$faker  = Faker\Factory::create();

echo $faker->address;
echo '<br>';
echo $faker->date('Y/m/d').' ('.$faker->time('H:i').')';
