<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class SchoolController extends Controller
{
    public function index()
    {
        $school = School::all();
        return view('school', compact('school'));
    }

    public function create()
    {
        $school = new School;
        return view('short.create', compact('school'));
    }
    //public function redirectToFullUrl($token)
    //{
    //$token= strtolower($token);
    //$school=School::where('short_url',$token)->first();

    //if ($school===null){
    //return redirect('/')->with('status','oops it donot have any short url');
    //}
    //return redirect($school->long_url);

    //}
    public function store(Request $request)
    {
        $input = $request->all();
        $url= $input['long_url'];
        $existing_short_url= School::where('long_url',$url)->first();
        if ($existing_short_url != null)
        {
            $message = "Your short Url is: " . url($existing_short_url->short_url);
            return redirect('/')->with('status',$message);
        }
        while (true){
            $input['short_url']=strtolower(str_random(8));
            $school = School::where('short_url',$input['short_url'])->first();

            if ($school===null){
                break;
            }
        }
        //School::create($input);
        //$message = "Your short url is:" . url($input['short_url']);
        //return redirect('/')->with('status', $message);
    }


}
