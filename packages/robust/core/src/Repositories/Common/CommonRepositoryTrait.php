<?php

namespace Robust\Core\Repositories\Common\Traits;

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
     * @param $select_string
     * @return $this
     */
    public function select($select_string)
    {
        $this->model = $this->model->select($select_string);
        return $this;
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
     * @return mixed
     */
    public function first()
    {
        return $this->model->first();
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

    /**
     * @param $id
     */
    public function toggleStatus($id)
    {
        $model = $this->model->find($id);
        $model->status = ($model->status == 0) ? 1 : 0;
        $model->save();

    }


}
