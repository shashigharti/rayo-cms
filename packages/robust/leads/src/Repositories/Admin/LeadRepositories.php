<?php
namespace Robust\Leads\Repositories\Admin;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Robust\Core\Repositories\Traits\CommonRepositoryTrait;
use Robust\Core\Repositories\Traits\CrudRepositoryTrait;
use Robust\Core\Repositories\Traits\SearchRepositoryTrait;
use Robust\Leads\Models\Lead;


/**
 * Class LeadRepositories
 * @package Robust\Leads\Repositories\Admin
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

    public function byType($type)
    {
        $userArr = $this->model->query();
        $userArr->with('metadata', 'agent');

        if ($type == 'unassigned') {
            $userArr->whereNull('agent_id');
        } else {
            if ($type == 'assigned') {
                $userArr->where('agent_id', '!=', null);
            } else {
                if ($type == 'archived') {
                    $userArr->where('user_type', '=', 'archived');
                } else {
                    if ($type == 'discarded') {
                        $userArr->where('user_type', '=', 'discarded');
                    } else {
                        if ($type == 'unregistered') {
                            $userArr->where('user_type', '=', 'unregistered');
                        } else {
                            if ($type == 'new') {
                                $userArr->where('leads.created_at', '>', DB::raw('NOW() - INTERVAL 48 HOUR'));
                            } else {
                                if ($type == 'all') {
                                    // no condition, get all the leads.
                                } else {
                                    $userArr->where('user_type', '!=', 'unregistered');
                                    $userArr->where('user_type', '!=', 'archived');
                                    $userArr->where('user_type', '!=', 'discarded');
                                    $userArr->where('user_type', '!=', 'hidden');
                                }
                            }
                        }
                    }
                }
            }
        }
        $userArr = $userArr->paginate(30);

        foreach ($userArr as $userDetail) {
            $last_active_user = $userDetail->last_active;
            $userDetail['last_login'] = null;
            $dates_followup = [];

            // Check last_login parsed time
            if ($last_active_user != null) {
                $last_active = Carbon::parse($last_active_user);
//                $last_active_user = strtotime($last_active_user);
                $userDetail['last_login'] = $last_active->diffInMinutes(Carbon::now()) < 5 ? 'Online' : $last_active;
            }

            // Get follow ups
            if (isset($userDetail->latestFollowUps) and !empty($userDetail->latestFollowUps)) {
                foreach ($userDetail->latestFollowUps as $single) {
                    if (count($dates_followup) < 2) {
                        $dates_followup[$single->id] = [
                            'date' => $single->date,
                            'note' => $single->note,
                            'type' => $single->type,
                            'agent_id' => $single->agent_id
                        ];
                    }
                }
            }
            $userDetail['latest_followup_dates'] = $dates_followup;
        }
        return $userArr;
    }

    public function byAgent($id)
    {
        $leadArr = $this->model->query();

        if ($id == 0) {
            $leadArr->where('agent_id', '!=', null);
        } else {
            $leadArr->where('agent_id', $id);
        }
        return $leadArr;
    }

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
