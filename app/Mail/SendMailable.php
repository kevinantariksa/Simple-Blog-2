<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendMailable extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
     public function __construct($name)
     {
         $this->name = $name;
     }

     /**
      * Build the message.
      *
      * @return $this
      */
     public function build()
     {
       return $this->view('email.verify_account')->with([
          'email_token' => $this->user->email_token
      ]);
     }
}
