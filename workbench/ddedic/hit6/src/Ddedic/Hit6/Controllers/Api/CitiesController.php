<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 20:55
 */

namespace Ddedic\Hit6\Controllers\Api;

use Ddedic\Hit6\Support\Controllers\ApiController;
use Ddedic\Hit6\Cities\Interfaces\CityInterface;
use Symfony\Component\HttpFoundation\Response;


class CitiesController extends ApiController {


    protected $cities;

    public function __construct(CityInterface $cities)
    {

        $this->cities = $cities;

    }



    public function index()
    {
        return $this->cities->getModel()->with(['shops.events'])->get();
    }

}