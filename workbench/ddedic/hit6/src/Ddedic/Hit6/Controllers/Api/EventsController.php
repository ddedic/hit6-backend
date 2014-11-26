<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 20:55
 */

namespace Ddedic\Hit6\Controllers\Api;

use Ddedic\Hit6\Support\Controllers\ApiController;
use Ddedic\Hit6\Events\Interfaces\EventInterface;
use Symfony\Component\HttpFoundation\Response;


class EventsController extends ApiController {


    protected $events;

    public function __construct(EventInterface $events)
    {

        $this->events = $events;

    }


    public function index()
    {
        return $this->events->getModel()->paginate(10);
    }


    public function create()
    {

    }


}