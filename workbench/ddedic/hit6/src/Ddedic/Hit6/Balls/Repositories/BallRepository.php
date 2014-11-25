<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 14:16
 */

namespace Ddedic\Hit6\Balls\Repositories;


use Illuminate\Database\Eloquent\Model;
use Ddedic\Hit6\Balls\Interfaces\BallInterface;
use Ddedic\Hit6\Support\Repositories\BaseRepository;



class BallRepository extends BaseRepository implements BallInterface {


    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function getBalls()
    {
        return $this->model->select(['id', 'number', 'color'])->take(49)->get();
    }

} 