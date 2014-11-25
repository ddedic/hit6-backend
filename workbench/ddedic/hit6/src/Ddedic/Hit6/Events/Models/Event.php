<?php
namespace Ddedic\Hit6\Events\Models;


use Ddedic\Hit6\Support\Models\BaseModel;


/**
 * Class Event
 */
class Event extends BaseModel
{

    protected $rules = [
        'day'       => 'required',
        'week'      => 'required',
        'shop_id'   => 'required',
        'event_raw' => 'required',
        'combined'  => 'required',
        'sorted'    => 'required'
    ];

    protected $validationMessages = [
        'slug.unique' => "Another post is using that slug already."
    ];


    protected $fillable = [
        'shop_id', 'day', 'week', 'event_raw', 'combined', 'sorted',

        'b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'b7', 'b8', 'b9', 'b10', 'b11', 'b12', 'b13', 'b14', 'b15',
        'b16', 'b17', 'b18', 'b19', 'b20', 'b21', 'b22', 'b23', 'b24', 'b25', 'b26', 'b27', 'b28', 'b29', 'b30',
        'b31', 'b32', 'b33', 'b34', 'b35'
    ];


    protected $visible = ['id', 'event_raw', 'combined', 'sorted'];


    public function bets()
    {
        return $this->hasMany('Ddedic\Hit6\Bets\Models\Bet');
    }

    public function shop()
    {
        return $this->belongsTo('Ddedic\Hit6\Shops\Models\Shop');
    }



}