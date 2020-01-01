<?php

namespace Robust\Admin\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Robust\Admin\Models\User;

class PasswordResetNotification extends Notification
{
    use Queueable;

    private $user;
    private $token;

    public function __construct(User $user, $token = null)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
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
        $body = replace_variables($template->body, $lead, 'lead');
        $subject = replace_variables($template->subject, $lead, 'lead');
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
