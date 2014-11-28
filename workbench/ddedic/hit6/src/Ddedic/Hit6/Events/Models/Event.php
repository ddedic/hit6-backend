<?php
namespace Ddedic\Hit6\Events\Models;


use Ddedic\Hit6\Support\Models\BaseModel;
use Carbon\Carbon;

/**
 * Class Event
 */
class Event extends BaseModel
{

    protected $rules = [
        'shop_id'   => 'required',
        'event_raw' => 'numeric'
        /*
                'b1'        => 'required',
                'b2'        => 'required',
                'b3'        => 'required',
                'b4'        => 'required',
                'b5'        => 'required'

                'b6'        => 'required',
                'b7'        => 'required',
                'b8'        => 'required',
                'b9'        => 'required',
                'b10'        => 'required',
                'b11'        => 'required',
                'b12'        => 'required',
                'b13'        => 'required',
                'b14'        => 'required',
                'b15'        => 'required',
                'b16'        => 'required',
                'b17'        => 'required',
                'b18'        => 'required',
                'b19'        => 'required',
                'b20'        => 'required',
                'b21'        => 'required',
                'b22'        => 'required',
                'b23'        => 'required',
                'b24'        => 'required',
                'b25'        => 'required',
                'b26'        => 'required',
                'b27'        => 'required',
                'b28'        => 'required',
                'b29'        => 'required',
                'b30'        => 'required',
                'b31'        => 'required',
                'b32'        => 'required',
                'b33'        => 'required',
                'b34'        => 'required',
                'b35'        => 'required'
                */
    ];

    protected $validationMessages = [
        'slug.unique' => "Another entry is using that slug already."
    ];



    protected $fillable = [
        'shop_id', 'event_raw', 'combined', 'sorted',

        'b1', 'b2', 'b3', 'b4', 'b5', 'b6', 'b7', 'b8', 'b9', 'b10', 'b11', 'b12', 'b13', 'b14', 'b15',
        'b16', 'b17', 'b18', 'b19', 'b20', 'b21', 'b22', 'b23', 'b24', 'b25', 'b26', 'b27', 'b28', 'b29', 'b30',
        'b31', 'b32', 'b33', 'b34', 'b35'
    ];


    //protected $visible = ['id', 'event_raw', 'combined', 'sorted'];


    public function bets()
    {
        return $this->hasMany('Ddedic\Hit6\Bets\Models\Bet');
    }

    public function shop()
    {
        return $this->belongsTo('Ddedic\Hit6\Shops\Models\Shop');
    }





    protected static function boot() {
        parent::boot();
        static::saving(function($event) {


            $dt = Carbon::now();

            $event->year = $dt->year;
            $event->month = $dt->month;
            $event->week = $dt->weekOfYear;
            $event->day = $dt->dayOfWeek;



        });
    }



}