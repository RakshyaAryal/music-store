<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MailingController extends Controller
{
    public function create(Request $request)
    {
        $this->validate($request,[
            'email'=>'required|email',
            ],[
                'email'=>'Enter valid email.',
        ]);
        dd($request->email);
    }
}
