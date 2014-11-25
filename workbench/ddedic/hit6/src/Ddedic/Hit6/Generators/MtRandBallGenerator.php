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
use Illuminate\Database\Eloquent\Collection;


class MtRandBallGenerator extends AbstractBallGenerator implements BallGeneratorInterface {


    public function __construct()
    {

    }

    /**
     * @param BallInterface $balls
     * @return mixed
     */
    public function generateBalls(BallInterface $balls)
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

        //dd($generated);

        foreach ($generated as $key => $value) {
            array_push($randomizedBalls, $ballsdata[$value - 1]);
        }



        return $this->formatBalls( new Collection($randomizedBalls) );
    }

} 