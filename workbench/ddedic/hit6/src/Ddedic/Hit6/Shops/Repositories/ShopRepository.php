<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 14:16
 */

namespace Ddedic\Hit6\Shops\Repositories;


use Illuminate\Database\Eloquent\Model;
use Ddedic\Hit6\Support\Repositories\BaseRepository;
use Ddedic\Hit6\Shops\Interfaces\ShopInterface;



class ShopRepository extends BaseRepository implements ShopInterface {


    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function getShops()
    {
        return $this->model->select(['*'])->get();
    }

} 