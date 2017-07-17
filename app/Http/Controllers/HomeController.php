<?php

namespace App\Http\Controllers;

use App\Generes;
use App\Music;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $music = Music::paginate(6);
        return view('home.index',compact('music'));
    }
    public function singleMusic($id)
    {
        $item = Music::findorfail($id);
        return view('home.single-music',compact('item'));
    }

    public function search(Request $request)
    {
        $music = $request->get('music_name');
        $music = Music::where('album_name', 'LIKE', '%'.$music.'%')->paginate(6);

        return view('home.index', compact('music'));
    }

    public function generesWiseView($generes, $id)
    {
//        dd(Generes::find($id)->music()->get()->toArray());
        $music = Generes::find($id)->music()->paginate(5);

        return view('home.index',compact('music'));
    }





}
