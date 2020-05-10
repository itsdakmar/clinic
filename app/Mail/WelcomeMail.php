<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class WelcomeMail extends Mailable
{
    use Queueable, SerializesModels;
    private $fullName, $password;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->fullName = $data['name'];
        $this->password = $data['password'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $fullName = $this->fullName;
        $password = $this->password;
        $loginUrl = route('login');
        return $this->markdown('emails.welcome', compact('fullName','password', 'loginUrl'));
    }
}
