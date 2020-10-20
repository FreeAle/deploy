<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\MainSetting;


class ForgotPassword extends Notification
{
    use Queueable;
    public $data;
    public $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($otp)
    {
        //
        $this->data=$otp; 
         $this->name = MainSetting::find(1)->name;
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
        return (new MailMessage)
                     ->from(env('MAIL_FROM_ADDRESS'), $this->name)
                    ->line('Hii We Find You are Lost your password Don`t panic.')
                    ->line('Below Link give your password back you just want remember this OTP :-"'.$this->data.'"')
                    ->action('Click Here', url('/otp/validate'))
                    ->line('Thank you for using our application!');
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
