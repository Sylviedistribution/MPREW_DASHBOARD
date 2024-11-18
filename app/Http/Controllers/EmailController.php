<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmailController extends Controller
{
    public function sendTestEmail()
    {
        $recipient = 'recipient@example.com';

        // Envoyer l'e-mail
        Mail::to($recipient)->send(new TestEmail());

        return response()->json(['message' => 'Email sent successfully.']);
    }
}
