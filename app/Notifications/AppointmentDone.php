<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\MainSetting;

class AppointmentDone extends Notification
{
    use Queueable;
    public $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
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
                    ->subject('Appoitment Booking')
                    ->line('Your Appointment is book at '.$this->name)
                    ->line('For more information Goto MyBooking section in Application')
                    // ->action('Notification Action', url('/'))
                    ->line('thank you choosing us!!!');
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
