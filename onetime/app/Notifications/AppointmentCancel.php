<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use App\MainSetting;


class AppointmentCancel extends Notification
{
    use Queueable;
    public $appointmentData;
    public $name;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($id)
    {
        //
        $this->appointmentData = $id;
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
            ->subject('Appoitment Cancel')
            ->line('Your Appointment is Cancel by' . $this->name)
            ->line('Your Appointment Number is' . $this->appointmentData)
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
