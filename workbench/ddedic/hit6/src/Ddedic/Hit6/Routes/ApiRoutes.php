<?php

// TEST
Route::group(['prefix' => 'test'], function () {

    $balls = App::make('Ddedic\Hit6\Balls\Interfaces\BallInterface');
    $bets = App::make('Ddedic\Hit6\Bets\Interfaces\BetInterface');
    $cities = App::make('Ddedic\Hit6\Cities\Interfaces\CityInterface');
    $events = App::make('Ddedic\Hit6\Events\Interfaces\EventInterface');
    $shops = App::make('Ddedic\Hit6\Shops\Interfaces\ShopInterface');
    //$generator = App::make('hit6.ball.generator');


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


    // GENERATOR
    Route::get('generator', function () {

        $data = BallGenerator::generateBalls();

        return Response::json($data);

    });


});





// API
Route::api(['prefix' => 'api', 'version' => 'v1', 'protected' => false], function()
{


    Route::get('/', function () {
        return Response::make(['API version 1.0.0']);
    });


    // EVENTS
    Route::group(['prefix' => 'events'], function () {

        Route::get('/', array('uses' => 'Ddedic\Hit6\Controllers\Api\EventsController@index', 'as' => 'api.events.index'));
        //Route::get('/{shop}', array('uses' => 'Ddedic\Hit6\Controllers\Api\EventsController@index', 'as' => 'api.events.shop'))->where('shop', '[0-9]+');



    });



    // SHOPS
    Route::group(['prefix' => 'shops'], function () {

        Route::get('/', array('uses' => 'Ddedic\Hit6\Controllers\Api\ShopsController@index', 'as' => 'api.shops.index'));
        //Route::get('/{shop}', array('uses' => 'Ddedic\Hit6\Controllers\Api\EventsController@index', 'as' => 'api.events.shop'))->where('shop', '[0-9]+');


    });


    // CITIES
    Route::group(['prefix' => 'cities'], function () {

        Route::get('/', array('uses' => 'Ddedic\Hit6\Controllers\Api\CitiesController@index', 'as' => 'api.cities.index'));
        //Route::get('/{shop}', array('uses' => 'Ddedic\Hit6\Controllers\Api\EventsController@index', 'as' => 'api.events.shop'))->where('shop', '[0-9]+');


    });




});