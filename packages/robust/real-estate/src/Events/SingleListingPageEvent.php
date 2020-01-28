<?php
namespace Robust\RealEstate\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\InteractsWithSockets;
use Robust\Admin\Models\User;
use Robust\RealEstate\Models\Listing;


/**
 * Class SingleListingPageEvent
 * @package Robust\RealEstate\Events
 */
class SingleListingPageEvent
{
    use InteractsWithSockets, SerializesModels;

    /**
     * @var User
     */
    public $user;

    /**
     * @var Listing
     */
    public $listing;

    /**
     * SingleListingPageEvent constructor.
     * @param User $user
     * @param Listing $listing
     */
    public function __construct(User $user, Listing $listing)
    {
        $this->user = $user;
        $this->listing = $listing;
    }
}
