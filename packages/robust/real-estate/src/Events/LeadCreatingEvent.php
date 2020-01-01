<?php
namespace Robust\RealEstate\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Robust\Admin\Models\User;

/**
 * Class LeadCreatingEvent
 * @package Robust\Admin\Events
 */
class LeadCreatingEvent
{
    use InteractsWithSockets, SerializesModels;

    public $user;

    /**
     * LeadCreatingEvent constructor. Create a new event instance.
     *
     * @param  Robust\Admin\Models\User  $user
     * @param  array  $data
     * @return void
     */
    public function __construct(User $user, array $data)
    {
        $this->user = $user;
        $this->data = $data;
    }
}
