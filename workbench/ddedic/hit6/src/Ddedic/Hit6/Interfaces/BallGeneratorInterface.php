<?php
/**
 * Project: boiler.dev
 * User: ddedic
 * Date: 23/11/14
 * Time: 20:59
 */

namespace Ddedic\Hit6\Interfaces;

use Ddedic\Hit6\Interfaces\BallInterface;


interface BallGeneratorInterface {

    public function generateBalls(BallInterface $ball);

} 