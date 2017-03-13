<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

use User;

class NuevoUsuario extends Mailable
{
    use Queueable, SerializesModels;

    public $name;
    public $email;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name,$email)
    {
        $this->name = $name;
        $this->email = $email;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('daniel.casique@gmail.com')
                    ->view('emails.NuevoUsuario')
                    ->with([
                        'name' => $this->name,
                        'email' => $this->email,
                    ]);
    }
}
