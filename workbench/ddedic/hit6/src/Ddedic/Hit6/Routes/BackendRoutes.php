<?php


// BACKEND
Route::group(['prefix' => 'backend'], function () {

    Route::get('/', function () {
        return Response::json(['Backend']);
    });

});