<?php

namespace Src\BoundedContext\Backend\Infrastructure\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class QueueFailureNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $queue = 'alerts';

    public function __construct()
    {
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail($notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('The Queue execution was failed, please try again.');
    }

    public function toArray($notifiable): array
    {
        return [];
    }
}
