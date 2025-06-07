<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class PaymentSuccessMail extends Mailable
{
    use Queueable, SerializesModels;

    public $userName;
    public $jasaNama;
    public $jasaHarga;
    public $jasaDp;
    public $jasaLayanan;

    /**
     * Create a new message instance.
     */
    public function __construct($userName, $jasaNama, $jasaHarga, $jasaDp, $jasaLayanan)
    {
        $this->userName = $userName;
        $this->jasaNama = $jasaNama;
        $this->jasaHarga = $jasaHarga;
        $this->jasaDp = $jasaDp;
        $this->jasaLayanan = $jasaLayanan;
    }

    /**
     * Get the message envelope.
     */
    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Pembayaran Berhasil',
        );
    }

    /**
     * Get the message content definition.
     */
    public function content(): Content
    {
        return new Content(
            view: 'emails.payment_success',
            with: [
                'userName' => $this->userName,
                'jasaNama' => $this->jasaNama,
                'jasaHarga' => $this->jasaHarga,
                'jasaDp' => $this->jasaDp,
                'jasaLayanan' => $this->jasaLayanan,
            ],
        );
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
