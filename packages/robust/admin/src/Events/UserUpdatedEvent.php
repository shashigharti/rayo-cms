<?php
namespace Robust\Admin\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Robust\Admin\Models\User;
use Robust\Core\Helpage\Site;

/**
 * Class UserUpdatedEvent
 * @package Robust\Admin\Events
 */
class UserUpdatedEvent
{
    use InteractsWithSockets, SerializesModels;

    public $user;

    /**
     * UserUpdatedEvent constructor.
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }
}
