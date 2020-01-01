<?php
namespace Robust\RealEstate\Notifications;

use Robust\RealEstate\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class LeadRegistrationNotification extends Notification
{
    use Queueable, SerializesModels;

    /**
     * The lead instance.
     *
     * @var Lead
     */
    public $lead;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Lead $lead)
    {
        $this->lead = $lead;
    }


    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        $template = email_template('Lead Registration');
        $body = replace_variables($template->body, $this->lead, 'lead');
        $subject = replace_variables($template->subject, $this->lead, 'lead');
        return (new MailMessage)
            ->from(config('rws.client.email.support'))
            ->subject($subject)
            ->line($body);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

}
