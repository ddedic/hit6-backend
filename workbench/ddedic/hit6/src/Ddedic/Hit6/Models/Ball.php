<?php
namespace Ddedic\Hit6\Models;


use Illuminate\Database\Eloquent\Model as Eloquent;
use Ddedic\Hit6\Interfaces\BallInterface;

/**
 * Class Ball
 */
class Ball extends Eloquent implements BallInterface
{
    protected $table = 'balls';





    function getBalls()
    {
        //return $this->select(['id', 'number', 'color'])->take(49)->remember(1)->get();
        return $this->select(['id', 'number', 'color'])->take(49)->get();
    }


}