<?php

namespace Robust\Admin\Listeners;

use Illuminate\Support\Str;
use Robust\Admin\Events\UserActivityEvent;
use Robust\Admin\Models\UserActivity;

/**
 * Class UserActivityEventListener
 * @package Robust\Admin\Listeners
 */
class UserActivityEventListener
{
    /**
     * @var
     */
    protected $model;

    /**
     * UserActivityEventListener constructor.
     * @param UserActivity $model
     */
    public function __construct(UserActivity $model)
    {
        $this->model = $model;
    }


    /**
     * @param UserActivityEvent $event
     */
    public function handle(UserActivityEvent $event)
    {
        $data = [
            'user_id' => $event->user,
            'title' => $event->title,
            'slug' => Str::slug($event->title),
            'url' => $event->url,
            'description' => $event->description
        ];
        $this->model->create($data);
    }
}
