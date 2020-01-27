<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\RealEstate\Models\Lead;
use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;


/**
 * Class LeadRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class LeadRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var Lead
     */
    protected $model;
    /**
     * LeadRepository constructor.
     * @param Lead $model
     */
    public function __construct(Lead $model)
    {
        $this->model = $model;
    }


    /**
     * @param $param
     * @return $this
     */
    public function whereStatus($param)
    {
        if($param){
            $this->model = $this->model->where('status_id',$param);
        }
        return $this;
    }

    /**
     * @param $param
     * @return $this
     */
    public function whereAgent($param)
    {
        if($param){
            $this->model = $this->model->where('agent_id',$param);
        }
        return $this;
    }
}
