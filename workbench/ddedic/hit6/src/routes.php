<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Response;


// TEST
Route::group(['prefix' => 'test'], function () {

    $balls = App::make('Ddedic\Hit6\Balls\Interfaces\BallInterface');
    $bets = App::make('Ddedic\Hit6\Bets\Interfaces\BetInterface');
    $cities = App::make('Ddedic\Hit6\Cities\Interfaces\CityInterface');
    $events = App::make('Ddedic\Hit6\Events\Interfaces\EventInterface');
    $shops = App::make('Ddedic\Hit6\Shops\Interfaces\ShopInterface');





    // BALLS
    Route::get('balls', function () use ($balls) {

        $data = $balls->getBalls();

        return Response::json($data);

    });


    // BETS
    Route::get('bets', function () use ($bets) {

        $data = $bets->getBets();

        return Response::json($data);

    });


    // CITIES
    Route::get('cities', function () use ($cities) {

        $data = $cities->getModel()->all();

        return Response::json($data);

    });


    // EVENTS
    Route::get('events', function () use ($events) {

        $data = $events->getEvents();

        return Response::json($data);

    });


    // SHOPS
    Route::get('shops', function () use ($shops) {

        $data = $shops->getShops();

        return Response::json($data);

    });


});



// FRONTEND
Route::group(['prefix' => 'events'], function () {

    Route::get('/', array('uses' => 'Ddedic\Hit6\Controllers\Frontend\EventsController@index', 'as' => 'frontend.events.index'));


});

















// OLD SHIT -------------------------------------------------------------------

Route::get('mtrand', function () {


    $generated = [];


    do {

        $rand = mt_rand(1,35);

        if(!array_key_exists($rand, $generated)) {

            $generated[$rand] = $rand;

        }

    } while ((count($generated) < 35 ));


    //\Debugbar::info(asort($generated));


    die("<pre>" . print_r($generated, true) . "</pre>");

    //return \Response::json($generated);

});



// --------------------
// EVENTS -------------

/*
Route::post('events', 'Ddedic\Hit6\Controllers\EventsController@create');
Route::get('events/generate', 'Ddedic\Hit6\Controllers\EventsController@generate');
Route::post('events/test', 'Ddedic\Hit6\Controllers\EventsController@test');


Route::get('balls', 'Ddedic\Hit6\Controllers\EventsController@balls');
Route::get('errortest', 'Ddedic\Hit6\Controllers\EventsController@errortest');



Route::get('/', 'Ddedic\Hit6\Controllers\EventsController@start');
Route::get('last', 'Ddedic\Hit6\Controllers\EventsController@last');
Route::get('/demo/my', 'Ddedic\Hit6\Controllers\EventsController@demo_my');
*/

