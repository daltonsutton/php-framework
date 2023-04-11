<?php

use Pecee\SimpleRouter\SimpleRouter as Route;
use System\View;

Route::group(['prefix' => '/api'], function () {
    
    Route::get('/', function() {
        return response()->json([
            'title' => 'PHP Framework',
            'content' => 'Welcome to the API'
        ]);
    });

    Route::get('/users', function() {
        return json_encode([
            'users' => Models\User::all()
        ]);
    });
    
});