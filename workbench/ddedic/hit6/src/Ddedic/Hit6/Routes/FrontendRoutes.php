<?php

use Illuminate\Support\Facades\Response;


// DEFAULT
Route::get('/', function () {
    return Response::json(['Frontend']);
});


// FRONTEND
Route::group(['prefix' => 'events'], function () {

    Route::get('/', array('uses' => 'Ddedic\Hit6\Controllers\Frontend\EventsController@index', 'as' => 'frontend.events.index'));

});