<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewOrderNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
public function via($notifiable)
{
    return ['mail', 'database'];
}

public function toMail($notifiable)
{
    return (new MailMessage)
        ->subject('New Order Received')
        ->line('A new order has been placed.')
        ->action('View Order', url('/orders'))
        ->line('Thank you for using our application!');
}

public function toDatabase($notifiable)
{
    return [
        'order_id' => 123,
        'message' => 'A new order was placed.',
    ];
}


    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
