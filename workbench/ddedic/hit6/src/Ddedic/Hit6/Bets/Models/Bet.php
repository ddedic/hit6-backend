<?php
namespace Ddedic\Hit6\Bets\Models;


use Illuminate\Database\Eloquent\Model as Eloquent;
use Ddedic\Hit6\Support\Models\BaseModel;


/**
 * Class Bet
 */
class Bet extends BaseModel
{
    protected $table = 'bets';

    protected $visible = ['id', 'stake', 'combination', 'win', 'created_at'];



    public function event()
    {
        return $this->belongsTo('Ddedic\Hit6\Events\Models\Event');
    }





}