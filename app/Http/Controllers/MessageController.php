<?php

namespace App\Http\Controllers;

use App\Models\Message;

class MessageController extends Controller
{
    public function all()
    {
        return Message::all();
    }

    public function create()
    {
        $message = new Message([
            'text' => 'Example text'
        ]);

        $message->save();

        return $message;
    }
}
