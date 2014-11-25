<?php
namespace Ddedic\Hit6\Cities\Models;

use Ddedic\Hit6\Support\Models\BaseModel;


/**
 * Class City
 */
class City extends BaseModel
{
    protected $table = 'cities';

    protected $hidden = ['active', 'created_at', 'updated_at'];




    public function shops()
    {
        return $this->hasMany('Ddedic\Hit6\Shops\Models\Shop');
    }


}