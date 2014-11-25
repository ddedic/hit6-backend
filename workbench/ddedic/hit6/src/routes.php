<?php


use Ddedic\Hit6\Models\City;
use Ddedic\Hit6\Models\Event;
use Carbon\Carbon;



Route::get('shops', function() {

    $d = City::with('shops')->first();
    Debugbar::info($d->toArray());


    echo 'Shops Route';
});


Route::get('events', function () {

    $d = Event::take(50)->get();
    Debugbar::info($d->toArray());


    echo $d;
});


Route::get('carbon', function () {


    $dt = Carbon::now();

    dd( $dt->weekOfYear);

});


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

Route::post('events', 'Ddedic\Hit6\Controllers\EventsController@create');
Route::get('events/generate', 'Ddedic\Hit6\Controllers\EventsController@generate');
Route::post('events/test', 'Ddedic\Hit6\Controllers\EventsController@test');


Route::get('balls', 'Ddedic\Hit6\Controllers\EventsController@balls');
Route::get('errortest', 'Ddedic\Hit6\Controllers\EventsController@errortest');



Route::get('/', 'Ddedic\Hit6\Controllers\EventsController@demo');
Route::get('/demo/my', 'Ddedic\Hit6\Controllers\EventsController@demo_my');


