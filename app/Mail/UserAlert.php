<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Container\Container;
use Illuminate\Contracts\Mail\Mailer as MailerContract;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Robust\Emails\Models\SentEmails;
use Robust\RealEstate\Model\Listings;
use Robust\Leads\Models\Lead;
use Robust\Leads\Models\UserSearch;
use Robust\Pages\Models\Logo;
use View;

/**
 * Class UserAlert
 * @package App\Mail
 */
class UserAlert extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;
    /**
     * @var Listings
     */
    private $listingArr;
    /**
     * @var Lead
     */
    private $leadObj;
    /**
     * @var \Robust\Leads\Models\UserSearch
     */
    private $userAlert;
    /**
     * @var
     */
    private $counts;


    /**
     * UserAlert constructor.
     * @param \Robust\Leads\Models\UserSearch $userAlert
     * @param \Illuminate\Database\Eloquent\Collection $listingArr
     * @param \Robust\Leads\Models\Lead $leadObj
     * @param $resultCounts
     */
    public function __construct(UserSearch $userAlert, Collection $listingArr, Lead $leadObj, $resultCounts)
    {
        $this->listingArr = clone $listingArr;
        $this->leadObj = $leadObj;
        $this->userAlert = $userAlert;
        $this->counts = $resultCounts;
    }

    /**
     * Build the message.
     * @return $this
     */
    public function build()
    {
        $agentObj = $this->leadObj->getAgent();

        $sold_count = !empty($this->counts['sold_count']) ? $this->counts['sold_count'] : 0;
        $active_count = !empty($this->counts['active_count']) ? $this->counts['active_count'] : 0;
        $total_count = !empty($this->counts['total_count']) ? $this->counts['total_count'] : 0;

        $html = View::make('emails.listing-alert.user-search-alert', [
            'listings' => $this->listingArr,
            'lead' => $this->leadObj,
            'agentObj' => $agentObj,
            'userAlert' => $this->userAlert,
            'active_count' => $active_count,
            'sold_count' => $sold_count,
            'total_count' => $total_count,
            'logo_path' => $this->getLogoPath(),
        ])->render();

        $html = preg_replace("/\s{4}/", "", $html);

        SentEmails::create([
            'agent_id' => $agentObj->id,
            'lead_id' => $this->leadObj->id,
            'subject' => $this->getSubject($this->userAlert),
            'email' => $html,
        ]);
        return $this->from(trim($agentObj->email), $agentObj->firstname . " " . $agentObj->lastname)
            ->to(trim($this->leadObj->email))
            ->subject($this->getSubject($this->userAlert))
            ->view('emails.listing-alert.user-search-alert', [
                'html' => $html,
                'content' => $html
            ])
            ->with([
                'listings' => $this->listingArr,
                'lead' => $this->leadObj,
                'agentObj' => $agentObj,
                'userAlert' => $this->userAlert,
                'active_count' => $active_count,
                'sold_count' => $sold_count,
                'total_count' => $total_count,
                'logo_path' => $this->getLogoPath(),
                'searchContent' => $this->userAlert->content,
            ]);
    }

    /**
     * @return string
     */
    private function getLogoPath()
    {
        $h_logo = Logo::where('location', 'header')->orderBy('created_at', 'desc')->first();
        return ($h_logo != null) ? $h_logo->path() : '';
    }


    /**
     * @param $listingAlert
     * @return string
     */
    private function getSubject($listingAlert)
    {
        $subject = "Property Update";
        if (date('l') == $listingAlert->frequency) {
            $subject = 'Weekly ' . $subject;
        } elseif ($listingAlert->frequency == 'Daily') {
            $subject = date('l') . "'s " . $subject;
        } elseif ($listingAlert->frequency == 'Biweekly') {
            $subject = 'Biweekly ' . $subject;
        } elseif ($listingAlert->frequency == 'Monthly') {
            $subject = 'Monthly ' . $subject;
        }
        return $subject;

    }

    /**
     * @param \Illuminate\Contracts\Mail\Mailer $mailer
     * @throws \ReflectionException
     */
    public function send(MailerContract $mailer)
    {
        Container::getInstance()->call([$this, 'build']);

        $mailer->send($this->buildView(), $this->buildViewData(), function ($message) {
            $message->setBody($this->buildViewData()['content'], 'text/html');
            $this->buildFrom($message)
                ->buildRecipients($message)
                ->buildSubject($message)
                ->buildAttachments($message)
                ->runCallbacks($message);
        });
    }
}
