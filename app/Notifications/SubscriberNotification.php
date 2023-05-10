<?php
namespace App\Notifications;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
class SubscriberNotification extends Notification
{
    use Queueable;

     public $name = '';
     public $body = '';

     public function __construct($name,$body){
        $this->name = $name;
        $this->body = $body;
     }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail($notifiable){

        $name = $this->name;
        $body = $this->body;
        return (new MailMessage)->view('emails.subscriber_user_message',compact('name','body'));

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
