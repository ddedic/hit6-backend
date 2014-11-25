<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 14:16
 */

namespace Ddedic\Hit6\Cities\Repositories;


use Illuminate\Database\Eloquent\Model;
use Ddedic\Hit6\Support\Repositories\BaseRepository;
use Ddedic\Hit6\Cities\Interfaces\CityInterface;



class CityRepository extends BaseRepository implements CityInterface {


    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function getCities()
    {
        return $this->model->select(['*'])->get();
    }

} 