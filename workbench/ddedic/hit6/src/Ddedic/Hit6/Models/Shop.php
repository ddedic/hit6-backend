<?php
namespace Ddedic\Hit6\Models;


use Ddedic\Hit6\Interfaces\ShopInterface;
use Illuminate\Database\Eloquent\Model as Eloquent;

/**
 * Class Shop
 */
class Shop extends Eloquent implements ShopInterface
{
    protected $table = 'shops';

    protected $hidden = ['created_at', 'updated_at', 'city_id'];




    public function city()
    {
        return $this->belongsTo('Ddedic\Hit6\Models\City');
    }

    public function events()
    {
        return $this->hasMany('Ddedic\Hit6\Models\Event');
    }

}