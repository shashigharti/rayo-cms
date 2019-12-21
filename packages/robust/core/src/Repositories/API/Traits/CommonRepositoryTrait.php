<?php

namespace Robust\Core\Repositories\API\Traits;

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
}
