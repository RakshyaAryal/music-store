<?php

namespace App\Http\Controllers\Admin;

use App\Generes;
use App\Http\Controllers\Controller;
use App\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class MusicController extends Controller
{
    public function index()
    {
        $generes = Generes::all();
        $music = Music::paginate(5);
        return view('admin.music.index', compact('music','generes'));
    }

    public function create()
    {
        $generes = Generes::all();
        $music = new Music;
        return view('admin.music.create', compact('music','generes'));
    }

    public function store(Request $request)
    {
        /* validation */
        $this->validate($request, [
            'artist' => 'required',
            'album_name' => 'required',
        ]);
        

        $input = $request->all();

        Music::create($input);
        $request->session()->flash('flash_message', 'User is successfully added!');
        return redirect('admin/music');
    }

    public function delete($id)
    {
        $music = Music::findorfail($id);
        $music->delete();

        return Redirect::to('admin/music');
    }

    public function edit($id)
    {
        $generes = Generes::all();
        $music = Music::findorfail($id);
        return view('admin.music.create', compact('music','generes'));
    }
    public function update($id,Request $request)
    {
        $input=$request->all();
        $music=Music::findorfail($id);
        $music->fill($input)->save();
        return redirect('admin/music');

    }
    public function view($id)
    {
        $music=Music::findorfail($id);
        return view('admin.music.single-view',compact('music'));

    }


}
