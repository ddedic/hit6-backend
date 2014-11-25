<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 23/11/14
 * Time: 20:59
 */

namespace Ddedic\Hit6\Generators\Interfaces;

use Ddedic\Hit6\Balls\Interfaces\BallInterface;


interface BallGeneratorInterface {

    public function generateBalls(BallInterface $ball);

} 