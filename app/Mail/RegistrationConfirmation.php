<?php

namespace App\Mail;

use App\Uporabnik;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationConfirmation extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;
    private $token;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Uporabnik $user, $token)
    {
        $this->user = $user;
        $this->token = $token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('stranka.email.potrdi',
            ["ime" => $this->user->ime, "token" => $this->token,
                "id" => $this->user->id_uporabnik]);
    }
}
