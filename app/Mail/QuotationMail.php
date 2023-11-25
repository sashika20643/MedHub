<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class QuotationMail extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    public $quotationData;

    /**
     * Create a new message instance.
     *
     * @param array $quotationData
     */
    public function __construct(array $quotationData)
    {
        $this->quotationData = $quotationData;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Quotation Information')
                    ->view('emails.quotation');
    }
}
