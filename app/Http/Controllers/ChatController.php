<?php

namespace App\Http\Controllers;

use App\Chat;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function index()
    {
        return view('chat.index');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        Chat::create($input);
        echo "data successfully saved";
        exit;
    }

    public function listAll()
    {
        $chat = Chat::all();
        return view('chat.list-all', compact('chat'));
    }
}
