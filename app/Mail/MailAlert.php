<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class MailAlert extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $titre;
    public $message;
    public $salutation;
    public $subject;
    public $notezbien;
    

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, $titre, $message, $salutation, $subject, $notezbien)
    {
       $this->name=$name;
       $this->titre=$titre;
       $this->message=$message;
       $this->salutation=$salutation;
       $this->subject=$subject;
       $this->notezbien=$notezbien;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject($this->subject)->markdown('admin.MailAlert');
    }
}
