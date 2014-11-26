<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 17:48
 */

namespace Ddedic\Hit6\Generators\Interfaces;
use Ddedic\Hit6\Balls\Interfaces\BallInterface;

interface EngineInterface {

    /**
     * @param BallInterface $balls
     * @return mixed
     */
    public function generate(BallInterface $balls);

} 