<?php
namespace Robust\Core\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Robust\Core\Models\User;

/**
 * Class UserCreatedEvent
 * @package Robust\Admin\Events
 */
class UserCreatedEvent
{
    use InteractsWithSockets, SerializesModels;

    public $user;

    /**
     * UserCreatedEvent constructor. Create a new event instance.
     *
     * @param  Robust\Core\Models\User  $user
     * @param  array  $data
     * @return void
     */
    public function __construct(User $user, array $data)
    {
        $this->user = $user;
        $this->data = $data;
    }
}
