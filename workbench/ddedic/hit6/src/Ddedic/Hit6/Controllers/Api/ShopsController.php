<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 20:55
 */

namespace Ddedic\Hit6\Controllers\Api;

use Ddedic\Hit6\Support\Controllers\ApiController;
use Ddedic\Hit6\Shops\Interfaces\ShopInterface;
use Symfony\Component\HttpFoundation\Response;

use API;

use League\Fractal;

class ShopsController extends ApiController {


    protected $events;
    protected $shops;

    public function __construct(ShopInterface $shops)
    {

        $this->shops = $shops;

    }



    public function index()
    {

        $items = $this->shops->getModel()->paginate(1);
        $item = $this->shops->getModel()->find(1);

        return API::response()->withCollection($items, $this->shops->getTransformer());
        //return API::response()->withItem($item, $this->shops->getTransformer());




    }

}