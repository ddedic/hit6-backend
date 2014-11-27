<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 23/11/14
 * Time: 19:36
 */

namespace Ddedic\Hit6\Shops\Interfaces;


interface ShopInterface {

    public function getShops();

    public function getTransformer();

    public function paginate($onlyActive = true);

    public function find($id, $active = true);

} 