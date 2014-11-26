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

class ShopTransformer extends TransformerAbstract {

    public function transform(Shop $shop)
    {
        return [
            'id' => (int) $shop->id,
            'name' => $shop->name,
            'active' => (bool) $shop->active
        ];
    }


} 