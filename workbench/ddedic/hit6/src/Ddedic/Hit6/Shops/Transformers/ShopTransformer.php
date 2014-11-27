<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 23:45
 */

namespace Ddedic\Hit6\Shops\Transformers;


use Ddedic\Hit6\Shops\Models\Shop;
use League\Fractal\TransformerAbstract;

use Ddedic\Hit6\Cities\Transformers\CityTransformer;


class ShopTransformer extends TransformerAbstract {


    protected $availableIncludes = [
        'city'
    ];

    /*
    protected $defaultIncludes = [
        ''
    ];
    */

    public function transform(Shop $shop)
    {
        return [
            'id' => (int) $shop->id,
            'name' => $shop->name,
            'link' => route('api.shops.show', $shop->id)
            //'active' => (bool) $shop->active
        ];
    }


    public function includeCity(Shop $shop)
    {
        $city = $shop->city;

        return $this->item($city, new CityTransformer, 'city');
    }

} 