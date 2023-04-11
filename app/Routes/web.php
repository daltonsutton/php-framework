<?php

use Pecee\SimpleRouter\SimpleRouter as Route;
use System\View;

Route::get('/', function() {
    return View::home([
        'title' => 'PHP Framework',
    ]);
});