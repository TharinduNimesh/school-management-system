<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Mail;

use Illuminate\Http\Request;

class MailController extends Controller
{
    public function sendSportTimeTable()
    {
        $data = array('name' => "Virat Gandhi");

        Mail::send(['text' => 'mail'], $data, function ($message) {
            $message->to('
           oqibz@example.com', 'Tutorials Point')->subject
                ('Laravel Testing Mail');
            $message->from('oqibz@example.com', 'Virat Gandhi');
        });

        echo "HTML Email Sent. Check your inbox.";
        die();
    }
}