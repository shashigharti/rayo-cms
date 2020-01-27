<?php

namespace Robust\Admin\Helpers;

use Carbon\Carbon;
use Robust\Admin\Models\UserActivity;

/**
 * Class UserActivityHelper
 * @package Robust\Admin\Helpers
 */
class UserActivityHelper
{

    /**
     * @var UserActivity
     */
    protected $model;


    /**
     * UserActivityHelper constructor.
     * @param UserActivity $model
     */
    public function __construct(UserActivity $model)
    {
        $this->model = $model;
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getAll($user)
    {
        return $this->model->where('user_id',$user)->get();
    }

    /**
     * @param $user
     * @param $slug
     * @return mixed
     */
    public function bySlug($user, $slug)
    {
        return $this->filter($user,$slug)->get();
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getLastLogin($user)
    {
        $activity = $this->filter($user,'logged-in')->first();
        if($activity){
            return $activity->created_at->diffForHumans();
        }
        return '-';
    }

    /**
     * @param $user
     * @return mixed
     */
    public function getLoginCount($user)
    {
        return $this->filter($user,'logged-in')->count();
    }

    /**
     * @param $user
     * @param $month
     * @return mixed
     */
    public function getLastLoginByDate($user)
    {
        return  [
            'current_month' => $this->filter($user,'logged-in')->whereBetween('created_at',[
                Carbon::now()->firstOfMonth(),Carbon::now()
            ])->count(),
            'past_month' =>  $this->filter($user,'logged-in')->whereBetween('created_at',[
                Carbon::now()->subMonth()->firstOfMonth(),Carbon::now()->subMonth()->lastOfMonth()
            ])->count(),
            'current_year' => $this->filter($user,'logged-in')->whereBetween('created_at',[
                Carbon::now()->firstOfYear(),Carbon::now()
            ])->count(),
        ];
    }

    /**
     * @param $user
     * @param $slug
     * @return mixed
     */
    public function filter($user, $slug)
    {
        return $this->model->where('user_id',$user)->where('slug',$slug);
    }
}
