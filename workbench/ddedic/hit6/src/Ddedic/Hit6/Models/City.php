<?php
namespace Ddedic\Hit6\Models;

use Illuminate\Database\Eloquent\Model as Eloquent;
use Ddedic\Hit6\Interfaces\CityInterface;


/**
 * Class City
 */
class City extends Eloquent implements CityInterface
{
    protected $table = 'cities';

    protected $hidden = ['active', 'created_at', 'updated_at'];




    public function shops()
    {
        return $this->hasMany('Ddedic\Hit6\Models\Shop');
    }


}