<?php
namespace Robust\RealEstate\Repositories\Api;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\RealEstate\Models\Lead;


/**
 * Class LeadRepositories
 * @package Robust\RealEstate\Repositories\Admin
 */
class LeadRepositories
{
    use CrudRepositoryTrait, SearchRepositoryTrait, CommonRepositoryTrait;

    /**
     * @var Lead
     */
    protected $model;


    /**
     * LeadRepositories constructor.
     * @param Lead $model
     */
    public function __construct(Lead $model)
    {
        $this->model=$model;
    }

    /**
     * @param $type
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator|\Illuminate\Database\Eloquent\Builder
     */
    public function byType($type)
    {
        $userType = ['archived','discarded','unregistered'];
        $leads = $this->model->query();
        if ($type == 'unassigned') {
            $leads->whereNull('agent_id');
        }
        if ($type == 'new') {
            $leads->where('real_estate_leads.created_at', '>', DB::raw('NOW() - INTERVAL 48 HOUR'));
        }
        if ($type == 'assigned') {
            $leads->where('agent_id', '!=', null);
        }
        if(in_array($type,$userType))
        {
            $leads->where('user_type',$type);
        } else {
            $leads->whereNotIn('user_type',$userType);
        }

        return $leads;
    }

    /**
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function byAgent($id)
    {
        $leads = $this->model->query();

        if ($id == 0) {
            $leads->where('agent_id', '!=', null);
        } else {
            $leads->where('agent_id', $id);
        }
        return $leads;
    }

    /**
     * @return Lead
     */
    public function getLead()
    {
        $lead = $this->model->load('loginHistory',
            'categories',
            'agent',
            'searches',
            'reports',
            'emails',
            'metadata',
            'activityLog',
            'notes');

        // Calculate login status
        $logins_this_month = [];
        $logins_this_year = [];
        $logins_past_month = [];
        $logins_past_year = [];

        $login_time = $lead->loginHistory->reverse()->first();
        $last_login = null;
        if ($login_time != null) {
            $last_login = Carbon::parse($login_time->time_of_login)->diffForHumans();
            foreach ($lead->loginHistory as $key => $value) {
                if (Carbon::parse($value->time_of_login)->year == Carbon::now()->year && Carbon::parse($value->time_of_login)->month == Carbon::now()->month) {
                    array_push($logins_this_month, $value->time_of_login);
                }
                if (Carbon::parse($value->time_of_login)->year == Carbon::now()->year && Carbon::parse($value->time_of_login)->month == (Carbon::now()->month - 1)) {
                    array_push($logins_past_month, $value->time_of_login);
                }
                if (Carbon::parse($value->time_of_login)->year == Carbon::now()->year) {
                    array_push($logins_this_year, $value->time_of_login);
                }
                if (Carbon::parse($value->time_of_login)->year == (Carbon::now()->year - 1)) {
                    array_push($logins_past_year, $value->time_of_login);
                }
            }
        }
        if ($login_time == null) {
            $last_login = '0';
        }
        $lead['logins'] = [
            'last_login' => $last_login,
            'this_month' => count($logins_this_month),
            'this_year' => count($logins_this_year),
            'last_month' => count($logins_past_month),
            'last_year' => count($logins_past_year),
        ];
        return $lead;
    }
}
