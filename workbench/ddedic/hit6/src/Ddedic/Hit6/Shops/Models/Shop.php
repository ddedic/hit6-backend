<?php
namespace Ddedic\Hit6\Shops\Models;


use Ddedic\Hit6\Support\Models\BaseModel;

/**
 * Class Shop
 */
class Shop extends BaseModel
{
    protected $table = 'shops';

    protected $hidden = ['created_at', 'updated_at', 'city_id'];




    public function city()
    {
        return $this->belongsTo('Ddedic\Hit6\Cities\Models\City');
    }

    public function events()
    {
        return $this->hasMany('Ddedic\Hit6\Cities\Models\Event');
    }

}