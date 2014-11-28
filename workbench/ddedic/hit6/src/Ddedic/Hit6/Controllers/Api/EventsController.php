<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 20:55
 */

namespace Ddedic\Hit6\Controllers\Api;

use Ddedic\Hit6\Balls\Models\Ball;
use Ddedic\Hit6\Support\Controllers\BaseApiController;
use Ddedic\Hit6\Events\Interfaces\EventInterface;
use Ddedic\Hit6\Shops\Interfaces\ShopInterface;

use Request, BallGenerator;


class EventsController extends BaseApiController {


    protected $events;
    protected $shops;

    public function __construct(EventInterface $events, ShopInterface $shops)
    {

        $this->events = $events;
        $this->shops = $shops;

    }

    public function index()
    {
        $items = $this->events->paginate();

        return $this->response->paginator($items, $this->events->getCollectionTransformer());
    }


    /**
     * @return mixed
     */
    public function all()
    {
        $items = $this->events->all();

        return $this->response->withCollection($items, $this->events->getItemTransformer());
    }


    public function show($id)
    {
        $event = $this->events->find($id);

        if ($event){

            return $this->response->withItem($event, $this->events->getItemTransformer());

        } else {

            return $this->response->errorNotFound();
        }

    }


    public function create()
    {
        $event = $this->events->getModel();

        $request = Request::all();
        $generatedBalls = BallGenerator::generateBalls();
        $arrayBalls = [];

        // Sort from min to max
        $request['sorted'] = json_encode((array_sort($generatedBalls, function($value)
        {
            return $value['number'];
        })));

        // Combine balls to one field
        $request['combined'] = json_encode($generatedBalls);

        // Create Array for DB save
        foreach ($generatedBalls as $ball => $value) {
            $arrayBalls[$ball] = $value['number'];
        }

        // Merge all
        $data = array_merge($request, $arrayBalls);


        //return $data;

        $event->fill($data);

        if ( ! $event->save())
        {
            throw new \Dingo\Api\Exception\StoreResourceFailedException('Could not create new event.', $event->getErrors());
        }


        return $this->response->created();

    }


}