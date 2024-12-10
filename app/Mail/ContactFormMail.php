<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Http\Request;

class ContactFormMail extends Mailable
{
    public $contactData;

    public function __construct($data)
    {
        $this->contactData = $data;
    }

    public function build()
    {
        return $this->subject('Nuevo mensaje de contacto')
                    ->view('emails.contact')
                    ->with('contactData', $this->contactData);
    }
}
