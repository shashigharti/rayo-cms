<?php
namespace Robust\RealEstate\Helpers;

use Robust\RealEstate\Models\GroupLead;
use Robust\RealEstate\Models\LeadGroup;
use Robust\RealEstate\Repositories\Admin\GroupLeadRepository;
use Robust\RealEstate\UI\Lead;

/**
 * Class LeadGroupHelper
 * @package Robust\RealEstate\Helpers
 */
class LeadGroupHelper
{
    /**
     * @var GroupLeadRepository
     */
    protected $model;
    /**
     * @var
     */
    protected $group;

    /**
     * LeadGroupHelper constructor.
     * @param GroupLeadRepository $model
     * @param LeadGroup $group
     */
    public function __construct(GroupLeadRepository $model, LeadGroup $group)
    {
        $this->model = $model;
        $this->group = $group->get();
    }

    /**
     * @param LeadGroup $model
     * @return mixed
     */
    public function getActiveGroups()
    {
        return $this->group->where('status',1)->all();
    }


    /**
     * @param $group_id
     * @param $lead_id
     */
    public function update($group_id, $lead_id)
    {
        $data = [
            'lead_id' => $lead_id,
            'group_id' => $group_id
        ];
        $this->model->update($data);
    }


    /**
     * @param $id
     * @param $group
     */
    public function delete($id, $group)
    {
        $this->model->delete($id,$group);
    }
}
