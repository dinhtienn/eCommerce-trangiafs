<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index(Request $request)
    {
        $email = $request->get('email');
        $content = $request->get('content');
        $insert = Message::insert(['email' => $email, 'content' => $content]);
        if ($insert) {
            return response()->json('success!');
        }
    }
}
