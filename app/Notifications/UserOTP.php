<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\MainSetting;

use Illuminate\Notifications\Messages\MailMessage;


class UserOTP extends Notification
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
        ->line('Hii there Your OTP is :-"'.$this->data.'"')
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
