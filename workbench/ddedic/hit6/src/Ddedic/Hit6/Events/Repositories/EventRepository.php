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
use Dingo\Api\Transformer\TransformableInterface;
use Ddedic\Hit6\Events\Transformers\EventTransformer;
use Ddedic\Hit6\Events\Transformers\EventsTransformer;


class EventRepository extends BaseRepository implements EventInterface {

    protected $perPage;




    public function __construct(Model $model)
    {
        $this->model = $model;
        $this->perPage = 25;
    }

    public function getItemTransformer()
    {
        return new EventTransformer;
    }

    public function getCollectionTransformer()
    {
        return new EventsTransformer;
    }

    public function getEvents()
    {
        return $this->model->all();
    }

    public function all()
    {
        return $this->model->all();
    }

    public function paginate()
    {
        return $this->model->paginate($this->perPage);
    }

    public function find($id)
    {
        return $this->model->find($id);
    }


} 