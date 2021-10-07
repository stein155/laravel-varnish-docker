<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function all()
    {
        return Message::latest()->get();
    }

    public function create(Request $request)
    {
        $message = new Message([
            'text' => $request->get('message')
        ]);

        $message->save();

        return $message;
    }
}
