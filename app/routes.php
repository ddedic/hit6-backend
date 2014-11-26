<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/




Route::get('test123', function () {
    echo '123';
});



Route::get('hello', function()
{
	//Debugbar::info("This is my info message!");

	return View::make('hello');
});




Route::get('num', function()
{
    //Debugbar::info("This is my info message!");


    for($i = 1;  $i < 36; $i++)
    {
        echo "'b" . $i . "', ";
    }

});


Route::get('vrijednosti', function () {


    $tmp = [
        0 => '',
        1 => '',
        2 => '',
        3 => '',
        4 => '',
        6 => '50',
        7 => '40',
        8 => '30',
        9 => '25',
        10 => '20',
        11 => '15',
        12 => '12.50',
        13 => '10',
        14 => '8.50',
        15 => '8',
        16 => '7.50',
        17 => '7',
        18 => '6.50',
        19 => '6',
        20 => '5.50',
        21 => '5',
        22 => '3',
        23 => '2.5',
        24 => '2',
        25 => '1.5',
        26 => '1',
        27 => '1',
        28 => '1',
        29 => '1',
        30 => '0.50',
        31 => '0.50',
        32 => '0.50',
        33 => '0.50',
        34 => '0.50',
        35 => '0.50'
    ];


    return \Response::json($tmp);

});