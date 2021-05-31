<?php

namespace App\Mail; 

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ContactUs extends Mailable
{
    use Queueable, SerializesModels;
    
    public $name;
    public $email;
    public $subject;
    public $body;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email,$subject,$body)
    {
        $this->name=$name;
        $this->email=$email;
        $this->subject=$subject;
        $this->body=$body;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        //data passed Automatically
        return $this->view('emails.contact')->from('mmed40089@gmail.com');
    }
}
