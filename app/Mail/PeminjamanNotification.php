<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;
use App\Models\Peminjaman;

class PeminjamanNotification extends Mailable
{
    use Queueable, SerializesModels;

    public $peminjaman;

    public function __construct(Peminjaman $peminjaman)
    {
        $this->peminjaman = $peminjaman;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Notifikasi Status Peminjaman Ruangan',
        );
    }

    public function content(): Content
    {
        return new Content(
            view: 'emails.peminjaman',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}