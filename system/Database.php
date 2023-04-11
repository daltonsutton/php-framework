<?php 

namespace System;

/**
 * PHP Framework
 *
 * Lightweight PHP Framework
 *
 * @package		php-framework
 * @link		https://dalton.sutton.io
 * @copyright	https://unlicense.org/
 */

use Illuminate\Database\Capsule\Manager as Capsule;
 
class Database {
    public function __construct() {
        $capsule = new Capsule;
        $capsule->addConnection([
             'driver' => Config::get('database.driver'),
             'host' => Config::get('database.host'),
             'database' => Config::get('database.database'),
             'username' => Config::get('database.username'),
             'password' => Config::get('database.password'),
             'charset' => Config::get('database.charset'),
             'collation' => Config::get('database.collation'),
             'prefix' => Config::get('database.prefix'),
        ]);
        // Setup the Eloquent ORM… 
        $capsule->bootEloquent();
    }
}