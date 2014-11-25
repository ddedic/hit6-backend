<?php
namespace Ddedic\Hit6\Models;


use Illuminate\Database\Eloquent\Model as Eloquent;


/**
 * Class Bet
 */
class Bet extends Eloquent implements BetInterface
{
    protected $table = 'bets';

    protected $visible = ['id', 'stake', 'combination', 'win', 'created_at'];



    public function event()
    {
        return $this->belongsTo('Ddedic\Hit6\Models\Event');
    }


}