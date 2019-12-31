<?php

namespace Robust\Core\Repositories\Common\Traits;

/**
 * Class CommonRepositoryTrait
 * @package Robust\Core\Repositories\API\Traits
 */
trait CommonRepositoryTrait
{
    /**
     * @return mixed
     */
    public function paginate($records = null)
    {
        $records = ($records == null) ? settings('app-setting', 'pagination') : $records;
        return $this->model->paginate($records);
    }

     /**
     * @param $columns
     * @return mixed
     */
    public function get($columns = [])
    {
        if ($columns) {
            $this->model->get($columns);
        }
        return $this->model->get();
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param $columns
     * @return mixed
     */
    public function limit($default = 100)
    {
        $this->model = $this->model->limit($default);
        return $this;
    }

    /**
     * @param $field
     * @return $this
     */
    public function with($field)
    {
        $this->model = $this->model->with($field);
        return $this;
    }

}
