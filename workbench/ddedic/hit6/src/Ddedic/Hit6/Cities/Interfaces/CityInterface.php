<?php
/**
 * Project: boiler.dev
 * User: ddedic
 * Date: 23/11/14
 * Time: 19:35
 */

namespace Ddedic\Hit6\Cities\Interfaces;


interface CityInterface {

    public function getCities();

    public function getTransformer();

    public function all($onlyActive = true);

    public function paginate($onlyActive = true);

    public function find($id, $active = true);


} 