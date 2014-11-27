<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 21:53
 */


App::error(function(Illuminate\Session\TokenMismatchException $exception, $code)
{
    $errors = [
        '_token' => [
            'Token tricking is very bad!'
        ]
    ];

    /**
     * Generate a new token for more security
     */
    Session::regenerateToken();


    //return Redirect::back()->withInput(Input::except('_token'))->withErrors($errors);
    return Response::json(['error' => $errors, 'code' => '500']);
});




App::error(function(Exception $exception, $code)
{
    Log::error($exception);


    switch ($code)
    {
        //case 403:
        //return Response::view('errors.403', array(), 403);

        case 404:
            return Response::json(['error' => 'Not Found', 'code' => '404']);

        // case 500:
        //return Response::view('errors.500', array(), 500);

        //default:
        //    return Response::view('errors.default', array(), $code);
    }


});

