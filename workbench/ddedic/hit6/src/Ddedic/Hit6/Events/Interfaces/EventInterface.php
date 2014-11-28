<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 23/11/14
 * Time: 19:35
 */

namespace Ddedic\Hit6\Events\Interfaces;


interface EventInterface {

    public function getEvents();

    public function getItemTransformer();

    public function getCollectionTransformer();

    public function all();

    public function paginate();

    public function find($id);
} 