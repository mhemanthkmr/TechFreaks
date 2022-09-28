<?php

require __DIR__ . '/vendor/autoload.php';

use Kreait\Firebase\Factory;
use Kreait\Firebase\Auth;

$factory = (new Factory)
    ->withServiceAccount('TechFreaks.json')
    ->withDatabaseUri('https://iot-project-2f20e-default-rtdb.firebaseio.com/');

$database = $factory->createDatabase();
$auth = $factory->createAuth();
$ref_table = 'Appliances';
$fetchdata = $database->getReference($ref_table)->getValue();
