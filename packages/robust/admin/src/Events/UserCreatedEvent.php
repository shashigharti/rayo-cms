<?php
namespace Robust\Admin\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Robust\Admin\Models\User;
use Robust\Core\Helpage\Site;

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
     * @param  Robust\Admin\Models\User  $user
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }


    // /**
    //  * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
    //  */
    // public function build()
    // {
    //     $this->to($this->user->email);
    //     return $this->view(Site::templateResolver('core::admin.emails.user-registration'));
    // }
}
