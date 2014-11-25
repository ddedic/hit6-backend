<?php
/**
 * Project: boiler.dev
 * User: ddedic
 * Date: 23/11/14
 * Time: 21:01
 */

namespace Ddedic\Hit6\Generators;


use Ddedic\Hit6\Interfaces\BallGeneratorInterface;
use Ddedic\Hit6\Interfaces\BallInterface;
use Ddedic\Hit6\Abstracts\AbstractBallGenerator;


class ShuffleBallGenerator extends AbstractBallGenerator implements BallGeneratorInterface {


    public function __construct()
    {

    }

    /**
     * @param BallInterface $balls
     * @return mixed
     */
    public function generateBalls(BallInterface $balls)
    {
        return $this->formatBalls(  $balls->getBalls()->shuffle() );
    }

} 