<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 23:45
 */

namespace Ddedic\Hit6\Cities\Transformers;


use Ddedic\Hit6\Cities\Models\City;
use Ddedic\Hit6\Shops\Transformers\ShopTransformer;
use League\Fractal\TransformerAbstract;

class CityTransformer extends TransformerAbstract {


    protected $availableIncludes = [
        'shops'
    ];



    public function transform(City $city)
    {
        return [
            'id' => (int) $city->id,
            'name' => $city->name
            //'active' => (bool) $city->active
        ];
    }


    public function includeShops(City $city)
    {
        $shops = $city->shops;
        return $this->collection($shops, new ShopTransformer, 'shops');
    }



} 