<?php namespace Ddedic\Hit6\Facades;

use Illuminate\Support\Facades\Facade;

class BallGeneratorFacade extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'hit6.ball.generator'; }

}