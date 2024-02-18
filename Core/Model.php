<?php

namespace Core;

use Illuminate\Database\Capsule\Manager as Capsule;

/**
 * Base model class.
 */
abstract class Model
{
    /**
     * The database connection.
     */
    public function dBConnection()
    {
        $capsule = new Capsule();
        $settings = parse_ini_file(__DIR__ . '/../.env');
        $capsule->addConnection([
            'driver' => $settings['DB_DRIVER'],
            'host' => $settings['DB_HOST'],
            'database' => $settings['DB_DATABASE'],
            'username' => $settings['DB_USER'],
            'password' => $settings['DB_PASSWORD'],
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_general_ci',
            'prefix' => '',
        ]);
        $capsule->setAsGlobal();
        $capsule->bootEloquent();
    }
}