<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 20:55
 */

namespace Ddedic\Hit6\Controllers\Api;

use Ddedic\Hit6\Support\Controllers\BaseApiController;
use Ddedic\Hit6\Cities\Interfaces\CityInterface;
use Symfony\Component\HttpFoundation\Response;

use API;


class CitiesController extends BaseApiController {


    protected $cities;

    public function __construct(CityInterface $cities)
    {
        $this->cities = $cities;

    }



    public function index()
    {
        return $this->response->withCollection($this->cities->all(), $this->cities->getTransformer());
    }

    public function paginate()
    {
        $items = $this->cities->paginate();

        return $this->response->paginator($items, $this->cities->getTransformer());
    }


    public function show($id)
    {
        $city = $this->cities->find($id);

        if ($city) {

            return $this->response->withItem($city, $this->cities->getTransformer());

        } else {

            return $this->response->errorNotFound();
        }

    }
}