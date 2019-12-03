<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

/**
 * Class CustomResetPasswordNotification
 * @package App\Notifications
 */
class CustomResetPasswordNotification extends Notification
{
    use Queueable;
    /**
     * @var
     */
    protected $token;

    /**
     * CustomResetPasswordNotification constructor.
     * @param $token
     */
    public function __construct($token)
    {
        $this->token = $token;
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
        $link = url( "/password/reset/?token=" . $this->token .'&email='.$notifiable->email);

        return ( new MailMessage )
            ->from('info@example.com')
            ->subject( 'Reset your password' )
            ->line( "You are receiving this email because we received a password reset request for your account." )
            ->action( 'Reset Password', $link )
            ->line("This password reset link will expire in 60 minutes.")
            ->line("If you did not request a password reset, no further action is required.")
            ->line( 'Thank you!' );
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
