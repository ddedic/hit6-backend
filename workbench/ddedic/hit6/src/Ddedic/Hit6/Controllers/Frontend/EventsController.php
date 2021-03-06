<?php
/**
 * Project: boiler.dev
 * User: ddedic
 * Date: 23/11/14
 * Time: 21:12
 */

namespace Ddedic\Hit6\Controllers\Frontend;

use Ddedic\Hit6\Support\Controllers\FrontendController;
use Ddedic\Hit6\Events\Interfaces\EventInterface;

use Illuminate\Support\Facades\Response;

class EventsController extends FrontendController {

    protected $events;
    protected $balls;


    public function __construct(EventInterface $event)
    {
        $this->events = $event;
    }


    public function index()
    {
        return Response::json(['It is ok!']);
    }




    /**
     * @param int $limit
     * @return \Illuminate\Http\JsonResponse
     */
    public function generate($limit = 500)
    {
        \Debugbar::disable();

        $data = [];

        for($i=0; $i < $limit; $i++) {

            $balls = $this->generator->generateBalls($this->balls);
            $sorted = array_values(array_sort($balls, function($value)
            {
                return (int) $value;
            }));

            $dt = Carbon::now();

            $insert = array_merge([
                'shop_id'   =>  1,
                'week'      =>  $dt->weekOfYear,
                'day'       =>  $dt->dayOfWeek,
                'event_raw' =>  0,
                'combined'  =>  json_encode(array_values($balls)),
                'sorted'    =>  json_encode($sorted),
                'created_at'=>  new \DateTime(),
                'updated_at'=>  new \DateTime()
            ], $balls);


            $data[] = $insert;
        }



        $chunks = array_chunk($data, 100);
        foreach($chunks as $chunk) {
            \DB::table('events')->insert($chunk);
        }


        echo "Succesfully generated events. Currently holding: " . $this->events->count();



    }






    public function generate__($limit = 50)
    {
        //\Debugbar::disable();


        $count = 0;

        for($i=0; $i < $limit; $i++) {

            $balls = $this->generator->generateBalls($this->balls);

            $sorted = array_values(array_sort($balls, function($value)
            {
                return (int) $value;
            }));

            $dt = Carbon::now();

            $data = array_merge([
                'shop_id'   =>  1,
                'week'      =>  $dt->weekOfYear,
                'day'       =>  $dt->dayOfWeek,
                'event_raw' =>  0,
                'combined'  =>  json_encode(array_values($balls)),
                'sorted'    =>  json_encode($sorted)
            ], $balls);


            //\Debugbar::info($combined);
            \Debugbar::info($sorted);

            $event = $this->events->newInstance();
            $event->fill($data);


            if ( ! $event->save())
            {
                return \Response::json($event->getErrors());
            }


            $count++;
        }


        echo "Succesfully generated {$count} events.";

    }

    /**
     *
     */
    public function test()
    {
        \Debugbar::disable();

        $event = $this->events->fill(\Input::all());




        if ( ! $event->save())
        {
            return \Response::json($event->getErrors());
        }

        return \Response::json($event);


    }



    function demo_my() {

        $balls = $this->generator->generateBalls($this->balls);

        \Debugbar::info($balls);

        $t = rand(1,15);

        if ($t > 13) {

            $balls['b2'] = '8';
            $balls['b4'] = '16';
            $balls['b5'] = '31';
            $balls['b7'] = '46';
            $balls['b9'] = '29';
            $balls['b12'] = '12';


        }


        $ballsToShow = json_encode(array_values($balls));

        return \View::make('hit6::demo', $data = ['balls' => $ballsToShow]);

        //return \Response::json($balls);


    }




    function demo() {

        $balls = $this->generator->generateBalls($this->balls);

        \Debugbar::info($balls);

        $ballsToShow = json_encode(array_values($balls));

        return \View::make('hit6::demo', $data = ['balls' => $ballsToShow]);

        //return \Response::json($balls);


    }




    function start()
    {

        $dt = Carbon::now();
        $balls = $this->generator->generateBalls($this->balls);
        $sorted = array_values(array_sort($balls, function($value)
        {
            return (int) $value;
        }));



        $data = array_merge([
            'shop_id'   =>  1,
            'week'      =>  $dt->weekOfYear,
            'day'       =>  $dt->dayOfWeek,
            'event_raw' =>  0,
            'combined'  =>  json_encode(array_values($balls)),
            'sorted'    =>  json_encode($sorted)
        ], $balls);


        \Debugbar::info(array_values($balls));
        \Debugbar::info($sorted);

        $event = $this->events->newInstance();
        $event->fill($data);


        if ( ! $event->save())
        {
            return \Response::json($event->getErrors());
        }





        // VIEW

        $ballsToShow = json_encode(array_values($balls));

        return \View::make('hit6::demo', $data = ['balls' => $ballsToShow]);
    }


    function last($limit = 15)
    {

        $last_events = $this->events->select(['id', 'combined', 'sorted', 'created_at'])->limit(50)->orderBy('created_at', 'desc')->get();
        //\Debugbar::info($d->toArray());


        return \View::make('hit6::last', $data = ['last_events' => $last_events]);



    }



} 