<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class MessageController extends Controller
{
    const MESSAGES = [
        'Dit is een testbericht',
        'Hello World!',
        'Prototype Test',
        'Testbericht naar microservice 1!',
        'Hallo Wereld'
    ];

    public function all()
    {
        Carbon::setLocale('nl');

        $messages = json_decode(
            Http::get('http://service1/messages')
        );

        echo "<a href=\"create\">Random bericht toevoegen</a><br>";

        foreach($messages as $message) {
            $date = Carbon::parse($message->created_at)->diffForHumans();
            echo "Toegevoegd: $date<br>";
            echo "Bericht:    $message->text <br><hr>";
        }
    }

    public function create()
    {
        $message = self::MESSAGES[array_rand(self::MESSAGES)];

        Http::post('http://service1/messages/create', compact('message'));

        return redirect('/');
    }
}
