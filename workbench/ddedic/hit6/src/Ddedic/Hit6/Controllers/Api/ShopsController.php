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

use API;

class ShopsController extends ApiController {


    protected $shops;

    /**
     * @param ShopInterface $shops
     */
    public function __construct(ShopInterface $shops)
    {
        $this->shops = $shops;
    }


    /**
     * @return mixed
     */
    public function index()
    {
        $items = $this->shops->paginate();

        return API::response()->withCollection($items, $this->shops->getTransformer());
    }



    public function show($id)
    {
        $shop = $this->shops->find($id);

        if ($shop){

            return API::response()->withItem($shop, $this->shops->getTransformer());

        } else {

            return API::response()->errorNotFound();
        }



    }



}