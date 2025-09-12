<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;

class NewOrderNotification extends Notification
{
    use Queueable;

    protected $orderData;

    public function __construct($orderData)
    {
        $this->orderData = $orderData;
    }

    public function via($notifiable)
    {
        return ['mail','database'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
                    ->subject('New Order #' . ($this->orderData['id'] ?? ''))
                    ->line('A new order was placed.')
                    ->action('View Order', url('/admin/orders/'.$this->orderData['id']))
                    ->line('Thank you.');
    }

    public function toDatabase($notifiable)
    {
        return [
            'order_id' => $this->orderData['id'] ?? null,
            'amount' => $this->orderData['amount'] ?? null,
            'message' => 'New order received'
        ];
    }
}
