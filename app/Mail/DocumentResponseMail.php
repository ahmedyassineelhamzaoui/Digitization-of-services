<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class DocumentResponseMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $name;
    public $operation;
    public $message;
    public $pathfile;
    public function __construct($name,$operation,$message,$pathfile)
    {
        $this->name = $name;
        $this->operation   = $operation;
        $this->message   = $message;
        $this->pathfile = $pathfile;
    }

    /**
     * Get the message envelope.
     *
     * @return \Illuminate\Mail\Mailables\Envelope
     */
    public function envelope()
    {
        return new Envelope(
            subject: 'Réponse de votre de demande ANL',
        );
    }

    /**
     * Get the message content definition.
     *
     * @return \Illuminate\Mail\Mailables\Content
     */
    public function content()
    {
        return new Content(
            markdown: 'emails.responseOfApplication',
        );
    }

    public function build()
    {
        return $this->from('sonapie@gmail.com', 'Sonapie')
                ->markdown('emails.responseOfApplication')
                ->with([
                    'name' => $this->name,
                    'operation' => $this->operation,
                    'message' => $this->message,
                    'path'   => $this->pathfile
                ]);
    }
    /**
     * Get the attachments for the message.
     *
     * @return array
     */
    public function attachments()
    {
        return [];
    }
}
