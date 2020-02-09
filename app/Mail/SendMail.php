<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMail extends Mailable
{
    use Queueable, SerializesModels;

    public $sub;
    public $msg;
    /** * Create a new message instance. * * @return void */                   
    public function __construct($subject,$message)
    {
        $this->sub = $subject;
        $this->msg = $message;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $e_sub = $this->sub;
        $e_msg = $this->msg;
        return $this->view('emailview', compact("e_msg"))->subject($e_sub);           
    }
}
