<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 23:45
 */

namespace Ddedic\Hit6\Events\Transformers;


use Ddedic\Hit6\Events\Models\Event;
use League\Fractal\TransformerAbstract;

use Ddedic\Hit6\Shops\Transformers\ShopTransformer;


class EventTransformer extends TransformerAbstract {


    protected $availableIncludes = [
        'shop'
    ];


    protected $defaultIncludes = [

    ];


    public function transform(Event $event)
    {
        return [
            'id' => (int) $event->id,
            'balls' => json_decode($event->combined),

            'link' => [
                'absolute'  =>  route('api.events.show', $event->id),
                'relative'  =>  route('api.events.show', $event->id, false)
            ]

            //'active' => (bool) $shop->active
        ];
    }


    public function includeShop(Event $event)
    {
        $shop = $event->shop;

        return $this->item($shop, new ShopTransformer, 'shop');
    }

} 