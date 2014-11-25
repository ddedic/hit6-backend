<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 14:16
 */

namespace Ddedic\Hit6\Events\Repositories;


use Illuminate\Database\Eloquent\Model;
use Ddedic\Hit6\Support\Repositories\BaseRepository;
use Ddedic\Hit6\Events\Interfaces\EventInterface;



class EventRepository extends BaseRepository implements EventInterface {


    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function getEvents()
    {
        return $this->model->all();
    }

} 