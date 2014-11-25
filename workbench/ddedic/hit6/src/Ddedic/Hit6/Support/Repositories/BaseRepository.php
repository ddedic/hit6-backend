<?php
/**
 * Project: hit6.dev
 * User: ddedic
 * Date: 25/11/14
 * Time: 14:23
 */

namespace Ddedic\Hit6\Support\Repositories;


abstract class BaseRepository
{
    protected $model;

    /**
     * Get empty model
     *
     * @return Model
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * Get table name
     *
     * @return string
     */
    public function getTable()
    {
        return $this->model->getTable();
    }


} 