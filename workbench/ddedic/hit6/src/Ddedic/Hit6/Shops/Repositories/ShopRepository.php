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
use Dingo\Api\Transformer\TransformableInterface;
use Ddedic\Hit6\Shops\Transformers\ShopTransformer;


class ShopRepository extends BaseRepository implements ShopInterface, TransformableInterface {

    protected $perPage;

    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->perPage = 25;
    }


    public function getShops()
    {
        return $this->model->select(['*'])->get();
    }


    public function paginate($onlyActive = true)
    {
        return $result = $onlyActive ? $this->model->where(['active' => '1'])->paginate($this->perPage) : $this->model->paginate($this->perPage);
    }


    public function getTransformer()
    {
        return new ShopTransformer();
    }

} 