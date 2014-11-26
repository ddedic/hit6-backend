<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 23/11/14
 * Time: 21:01
 */

namespace Ddedic\Hit6\Generators\Engines;

use Ddedic\Hit6\Balls\Interfaces\BallInterface;
use Ddedic\Hit6\Generators\AbstractBallGenerator;
use Ddedic\Hit6\Generators\Interfaces\EngineInterface;

use Illuminate\Database\Eloquent\Collection;


class ShuffleBallGenerator extends AbstractBallGenerator implements EngineInterface {


    public function __construct()
    {
       // Simple Shuffle Generator Engine
    }

    /**
     * @param BallInterface $balls
     * @return mixed
     */
    public function generate(BallInterface $balls)
    {
        return $this->formatBalls(  $balls->getBalls()->shuffle() );
    }

} 