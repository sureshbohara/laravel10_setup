<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Subscriber;
class SubscriptionConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    public $subscriber;

    public function __construct(Subscriber $subscriber)
    {
        $this->subscriber = $subscriber;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Subscription Notice',
        );
    }

     public function build(){
     $confirmationLink = route('confirm.subscription', ['subscriber' => $this->subscriber->id]);
     return $this->view('emails.subscription_confirmation')
                ->with([
                    'name' => $this->subscriber->name,
                    'confirmationLink' => $confirmationLink,
                ])
                ->subject('Confirm your subscription');
   }


    /**
     * Get the attachments for the message.
     *
     * @return array<int, \Illuminate\Mail\Mailables\Attachment>
     */
    public function attachments(): array
    {
        return [];
    }
}
