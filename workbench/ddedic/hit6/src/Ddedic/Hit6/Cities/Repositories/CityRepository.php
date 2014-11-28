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
use Dingo\Api\Transformer\TransformableInterface;
use Ddedic\Hit6\Cities\Transformers\CityTransformer;



class CityRepository extends BaseRepository implements CityInterface, TransformableInterface {


    protected $perPage;

    public function __construct(Model $model)
    {
        $this->model = $model;

        $this->perPage = 25;
    }

    public function getTransformer()
    {
        return new CityTransformer();
    }

    public function getCities()
    {
        return $this->model->select(['*'])->get();
    }

    public function find($id, $onlyActive  = true)
    {
        return $result = $onlyActive ? $this->model->where(['active' => '1'])->find($id) : $this->model->find($id);
    }


    public function all($onlyActive = true)
    {
        return $result = $onlyActive ? $this->model->where(['active' => '1'])->get() : $this->model->all();
    }


    public function paginate($onlyActive = true)
    {
        return $result = $onlyActive ? $this->model->where(['active' => '1'])->paginate($this->perPage) : $this->model->paginate($this->perPage);
    }

} 