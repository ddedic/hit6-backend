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


class MtRandBallGenerator extends AbstractBallGenerator implements EngineInterface {

    /**
     * @param BallInterface $balls
     * @return mixed
     */
    public function generate(BallInterface $balls)
    {

        $ballsdata = $balls->getBalls()->shuffle()->toArray();
        $generated = [];
        $randomizedBalls = [];


        do {

            $rand = mt_rand(1,49);

            if(!array_key_exists($rand, $generated)) {

                $generated[$rand] = $rand;

            }

        } while ((count($generated) < 49 ));


        foreach ($generated as $key => $value) {
            array_push($randomizedBalls, $ballsdata[$value - 1]);
        }



        return $this->formatBalls( new Collection($randomizedBalls) );
    }

} 