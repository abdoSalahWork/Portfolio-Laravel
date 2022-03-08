<?php

// namespace App\Mail;

namespace App\Http\Controllers;

// use Mail;
use Illuminate\Http\Request;


class MailController extends Controller
{

    function sendEmail(Request $request)
    {
        $request->validate([
            "name" => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:5',
        ]);

        $emailData = [
            'recipient' => 'abdo.salah2910@gmail.com',
            'fromEmail' => $request->email,
            'fromName' => $request->name,
            'subject' => $request->subject,
            'body' => $request->message
        ];
        \Mail::send('email-template' , $emailData , function($message) use ($emailData){
             $message->from($emailData['fromEmail'],$emailData['fromName'])
             ->to($emailData['recipient'])
             ->subject($emailData['subject']);
         });
         return redirect()->back();
    }
}
