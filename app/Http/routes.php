<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$app->group(['prefix' => '/api/v1'], function() use ($app) {
    $app->get('orders/cart', 'App\Http\Controllers\CartController@index');
    $app->post('orders/cart/add', 'App\Http\Controllers\CartController@store');
});