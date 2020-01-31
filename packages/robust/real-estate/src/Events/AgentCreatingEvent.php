<?php
namespace Robust\RealEstate\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Robust\Admin\Models\User;

/**
 * Class AgentCreatingEvent
 * @package Robust\RealEstate\Events
 */
class AgentCreatingEvent
{
    use InteractsWithSockets, SerializesModels;

    /**
     * @var User
     */
    public $user;

    /**
     * @var array
     */
    public $data;

    /**
     * AgentCreatingEvent constructor.
     * @param User $user
     * @param array $data
     */
    public function __construct(User $user, array $data)
    {
        $this->user = $user;
        $this->data = $data;
    }
}
