<?php
/**
 * Project: boiler.dev
 * User: ddedic
 * Date: 24/11/14
 * Time: 03:55
 */

namespace Ddedic\Hit6\Abstracts;

use Illuminate\Database\Eloquent\Collection;


class AbstractBallGenerator {

    const  POOL_SIZE = 35;

    public function formatBalls(Collection  $balls)
    {
        //die( \Response::json(($balls->toArray())));

        //\Debugbar::info($balls->count());

        $format = [];
        $data = $balls->take(self::POOL_SIZE)->toArray();

        for($i = 1; $i < (self::POOL_SIZE + 1); $i++) {
            $format[("b{$i}")] =  $data[$i - 1]['id']['id'];
        }

        return $format;
    }

} 