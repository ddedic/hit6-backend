<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 14:16
 */

namespace Ddedic\Hit6\Bets\Repositories;


use Illuminate\Database\Eloquent\Model;
use Ddedic\Hit6\Support\Repositories\BaseRepository;
use Ddedic\Hit6\Bets\Interfaces\BetInterface;



class BetRepository extends BaseRepository implements BetInterface {


    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function getBets()
    {
        return $this->model->select(['*'])->get();
    }

} 