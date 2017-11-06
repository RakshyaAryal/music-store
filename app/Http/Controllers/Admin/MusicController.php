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
        $music = Music::all();
        return view('admin.music.index', compact('music', 'generes'));
    }

    public function create()
    {
        $generes = Generes::all();
        $music = new Music;
        return view('admin.music.create', compact('music', 'generes'));
    }

    public function store(Request $request)
    {
        /* validation */
        $this->validate($request, [
            'artist' => 'required',
            'album_name' => 'required',
        ]);


        $file = $request->file('image');
        $input = $request->all();


        if ($file != null) {

            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();

            if ($this->validateImage($extension)) {

                $randomNumber = rand(100000, 9999999);

                $newFileName = $randomNumber . '_' . $fileName;

                $input['image'] = $newFileName;
                $destinationPath = 'uploads';
                $file->move($destinationPath, $newFileName);

            } else {

                $request->session()->flash('flash_message', 'Image is not valid!');
                return redirect('admin/music');

            }

        }

        Music::create($input);
        $request->session()->flash('flash_message', 'Music is successfully added!');
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
        return view('admin.music.create', compact('music', 'generes'));
    }

    public function update($id, Request $request)
    {
        $this->validate($request, [
            'artist' => 'required',
            'album_name' => 'required',
        ]);


        $file = $request->file('image');
        $input = $request->all();
        $music = Music::findorfail($id);


        if ($file != null) {

            $fileName = $file->getClientOriginalName();
            $extension = $file->getClientOriginalExtension();



            if ($this->validateImage($extension)) {

                $randomNumber = rand(100000, 9999999);

                $newFileName = $randomNumber . '_' . $fileName;

                $input['image'] = $newFileName;
                $destinationPath = 'uploads';
                $file->move($destinationPath, $newFileName);

            } else {

                $request->session()->flash('flash_message', 'Image is not valid!');
                return redirect('admin/music');

            }

        }
        $music->fill($input)->save();
        $request->session()->flash('flash_message', 'Music is successfully added!');
        return redirect('admin/music');
    }


    public function view($id)
    {
        $music=Music::findorfail($id);
        return view('admin.music.single-view',compact('music'));

    }

    public function validateImage($extension)
    {
        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
            return true;
        }
        return false;
    }


}
