<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class UserRegistration extends Mailable
{
    use Queueable, SerializesModels;

    public $_email, $_name, $_password;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( string $email, string $name, string $password )
    {
        $this->_email = $email;
        $this->_name = $name;
        $this->_password = $password;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): UserRegistration
    {
        return $this->view('emails.user-registration' )
            ->subject( 'User registration' )
            ->from( '' );

    }

}
