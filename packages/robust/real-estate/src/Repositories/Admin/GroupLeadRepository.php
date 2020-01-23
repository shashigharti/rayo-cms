<?php
namespace Robust\RealEstate\Repositories\Admin;

use Robust\Core\Repositories\Common\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Common\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\GroupLead;


/**
 * Class GroupLeadRepository
 * @package Robust\RealEstate\Repositories\Admin
 */
class GroupLeadRepository
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var GroupLead
     */
    protected $model;

    /**
     * GroupLeadRepository constructor.
     * @param GroupLead $model
     */
    public function __construct(GroupLead $model)
    {
        $this->model = $model;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function update($data)
    {
        return $this->model->updateOrCreate($data,$data);
    }

    /**
     * @param $lead
     * @param $group
     * @return mixed
     */
    public function delete($lead, $group)
    {
        return $this->model->where('lead_id',$lead)->where('group_id',$group)->delete();
    }
}
