<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class orderShipped extends Mailable
{
    use Queueable, SerializesModels;
    
    public $cart;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($cart)
    {
         $this->cart = $cart;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mails.order');
    }
}
