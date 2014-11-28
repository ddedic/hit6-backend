<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 20:55
 */

namespace Ddedic\Hit6\Controllers\Api;

use Ddedic\Hit6\Support\Controllers\BaseApiController;
use Ddedic\Hit6\Shops\Interfaces\ShopInterface;

use API;

class ShopsController extends BaseApiController {


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
        $items = $this->shops->all();

        return $this->response->withCollection($items, $this->shops->getTransformer());
    }

    public function paginate()
    {
        $items = $this->shops->paginate();

        return $this->response->paginator($items, $this->shops->getTransformer());
    }


    public function show($id)
    {
        $shop = $this->shops->find($id);

        if ($shop){

            return $this->response->withItem($shop, $this->shops->getTransformer());

        } else {

            return $this->response->errorNotFound();
        }

    }



}