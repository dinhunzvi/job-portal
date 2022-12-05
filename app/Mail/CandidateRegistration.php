<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CandidateRegistration extends Mailable
{
    use Queueable, SerializesModels;
    public $_name;
    public $_candidate;
    public $_attachment;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct( string $name, User $candidate, $attachment )
    {
        $this->_name = $name;
        $this->_candidate = $candidate;
        $this->_attachment = $attachment;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build(): CandidateRegistration
    {
        return $this->view('emails.candidate-registration' )
            ->subject( 'Candidate Registration' )
            ->from( 'frazstorage@gmail.com' )
            ->attach( $this->_attachment );

    }

}
