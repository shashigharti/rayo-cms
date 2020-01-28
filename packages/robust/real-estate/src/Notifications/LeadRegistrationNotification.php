<?php
namespace Robust\RealEstate\Notifications;

use Robust\RealEstate\Models\Lead;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Config;

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
        $config = config('rws.emails.subjects');
        $template = email_template('Lead Registration');
        $data = [
            'subject' => $config['Lead Registration'],
            'logo' => '',
            'verification_url' => $this->verificationUrl($notifiable)
        ];

        $body = replace_variables($template->body, $this->lead, $data);
        $subject = replace_variables($template->subject, $this->lead, $data);
        return (new MailMessage)
            ->from(config('client.email.support'))
            ->subject($subject)
            ->line(new HtmlString($body));
    }

    /**
     * Get the verification URL for the given notifiable.
     *
     * @param  mixed  $notifiable
     * @return string
     */
    protected function verificationUrl($notifiable)
    {
        return URL::temporarySignedRoute(
            'website.auth.verification.verify',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60)),
            ['id' => $notifiable->token]
        );
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
