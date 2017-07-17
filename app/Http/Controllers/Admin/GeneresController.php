<?php

namespace App\Http\Controllers\Admin;

use App\Generes;
use App\Http\Controllers\Controller;
use App\Music;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GeneresController extends Controller
{
    Public function index()
    {
        $generes= Generes::all();
        return view('admin.generes.index',compact('generes'));
    }
    Public function create()
    {

        $generes = new Generes();
        return view('admin.generes.create',compact('generes'));
    }
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|unique:generes|max:255',
        ]);
        $input = $request->all();
        Generes::create($input);
        $request->session()->flash('flash_message', 'Generes is successfully added!');
        return redirect('admin/generes');
    }
    Public function  delete($id,Request $request)
    {
        $generes = Generes::findorfail($id);
        $generes->delete();
        $request->session()->flash('flash_message','Generes deleted successfully!');
        return redirect('admin/generes');
    }
    public function edit($id)
    {
        $generes = Generes::findorfail($id);
        return view('admin.generes.create',compact('generes'));
    }
    public function update($id,Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
        ]);
        $input = $request->all();
        $generes = Generes::findorfail($id);
        $generes->fill($input)->save();
        $request->session()->flash('flash_message', 'generes updated successfully!');
        return redirect('admin/generes');
    }
    public function view($id)
    {
        $generes = Generes::findorfail($id);
        return view('admin.generes.single-view',compact('generes'));
    }
    public function getdetails()
    {
        $randomNumber = rand(0,2000);
        echo "Random Number: ". $randomNumber;
    }
    public function searchForm()
    {
        return view('admin.generes.search-form');
    }
    public function ajaxSearch(Request $request)
    {
        $music_name = $request->get('mname');

        $music = Music::where('album_name', 'LIKE', '%'.$music_name.'%')->get();

        return view('admin.generes.search-result', compact('music'));
    }
    

}
