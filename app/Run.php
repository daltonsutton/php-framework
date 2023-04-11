<?php

use System\View;
use System\Config;
use System\Input;
use System\Request;
use System\Session;
use System\Database;
use Spatie\Ignition\Ignition;
use Pecee\SimpleRouter\SimpleRouter as Route;

/*
 * Error reporting
 */
ini_set('display_error', true);
error_reporting(-1);

/**
 * Register composer autoloader
 */
$composer = require PATH . 'vendor/autoload' . EXT;
$composer->add('', APP . 'src');

/*
 * Set your applications current timezone
 */
date_default_timezone_set(Config::app('timezone', 'UTC'));

/**
 * Import helpers
 */
require APP . 'Helpers' . EXT;
require SYS . 'Routing/Helpers' . EXT;

/**
 * Import defined routes
 */
require APP . 'Routes/web' . EXT;
require APP . 'Routes/api' . EXT;

/**
 * Error handling
 */
Ignition::make()->runningInProductionEnvironment(false)->useDarkMode()->register();

/**
 * Set input
 */
Input::detect(Request::method());

/**
 * Read session data
 */
Session::start();

/**
 * Handle Error Routes
 */
Route::error(function(\Pecee\Http\Request $request, \Exception $exception) {

    switch($exception->getCode()) {
        // Page not found
        case 404:
            return View::error([
                'title' => 'Page not found',
                'content' => 'The page you are looking for could not be found.',
            ]);
            exit;
        break;

        // Internal server error
        case 500:
            return View::error([
                'title' => 'Internal server error',
                'content' => 'An internal server error has occurred. Please try again later.',
            ]);
            exit;
        break;
    }

});

/**
 * Start database connection
 */
new Database();

/**
 * Route the request
 */
Route::start();