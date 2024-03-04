<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ContentContactMail extends Mailable
{
    use SerializesModels;

    public function __construct(
        public string $email_to_send,
        public string $name,
        public string $email,
        public string $message,
        )
    {
        //
    }

    public function build()
    {
        $this->subject('Novo contato via website');
        $this->to($this->email_to_send);
        return $this->markdown('mail.contact',['name'=>$this->name,'email'=>$this->email,'message'=>$this->message]);
    }
}
