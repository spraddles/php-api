<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserEventsController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// List all users:
Route::get(
    '/users', 
    'App\Http\Controllers\UserController@index',
    ['only' => ['index']]
);

// Delete a user by ID:
Route::delete(
    'users/delete/{id}',
    'App\Http\Controllers\UserController@destroy',
    ['only' => ['destroy']]
);

// Get all user events:
Route::get(
    'events',
    'App\Http\Controllers\UserEventsController@index',
    ['only' => ['index']]
);

// Get users event count grouped by event type
Route::get(
    'events/grouped',
    'App\Http\Controllers\UserEventsController@grouped',
    ['only' => ['grouped']]
);
