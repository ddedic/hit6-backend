<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 24/11/14
 * Time: 03:55
 */

namespace Ddedic\Hit6\Abstracts;

use Illuminate\Database\Eloquent\Collection;


class AbstractBallGenerator {

    const POOL_SIZE = 35;

    public function formatBalls(Collection  $balls)
    {
        //dd($balls->toArray());

        $format = [];
        $data = $balls->take(self::POOL_SIZE)->toArray();

        for($i = 1; $i < (self::POOL_SIZE + 1); $i++) {
            $format[("b{$i}")] =  [
                'number' => $data[$i - 1]['number'],
                'color'  => $data[$i - 1]['color'],
            ];
        }

        return $format;
    }

} 