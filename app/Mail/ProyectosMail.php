<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class ProyectosMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $subject;
    public $data;
    public $view;
    public function __construct($subject, $data, $view)
    {
        $this->subject = $subject;
        $this->data = $data;
        $this->view = $view;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(

        );
    }

    public function build()
    {
        return $this
            ->subject($this->subject)
            ->with($this->data)
            ->with(['from' => env('MAIL_FROM_ADDRESS')])
            ->markdown($this->view);
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