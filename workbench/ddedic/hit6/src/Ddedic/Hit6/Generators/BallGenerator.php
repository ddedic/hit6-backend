<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 17:41
 */

namespace Ddedic\Hit6\Generators;


use Ddedic\Hit6\Generators\Interfaces\EngineInterface;
use Ddedic\Hit6\Generators\Interfaces\GeneratorInterface;
use Ddedic\Hit6\Balls\Interfaces\BallInterface;

class BallGenerator implements GeneratorInterface {


    protected $balls;
    protected $engine;



    public function __construct(EngineInterface $engine, BallInterface $balls)
    {
        $this->balls = $balls;
        $this->engine = $engine;
    }


    public function generateBalls()
    {
        return $this->engine->generate($this->balls);
    }

} 