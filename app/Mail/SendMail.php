<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $subject;
    public $content;

       public function __construct($subject, $content)
    {
        $this->subject = $subject;
        $this->content = $content;
    }

    public function build()
    {
        return $this->view('emails.bienvenido')
                    ->from(config('mail.from.address'), config('mail.from.name'))
                    ->subject($this->subject);
    }
    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    /*public function envelope()
    {
        return new Envelope(
            subject: 'Send Mail',
        );
    }

    public function content()
    {
        return new Content(
            view: 'view.name',
        );
    }

    public function attachments()
    {
        return [];
    }*/
}
