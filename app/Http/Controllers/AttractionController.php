<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;

class AttractionController extends Controller
{
    public function index() {
        $attractions = Attraction::all();
        return view('pages.attractions.index',compact('attractions'));
    }

    public function create(){
        return view ('pages.attractions.create');
    }

    public function store(Request $request) {
        Attraction::create($request->all());
        return redirect('pages.attractions.edit',compact ('attractions'));
    }

    public function edit($id) {
        $categories = Attraction::Find($id);
         return view('pages.attractions.edit',compact('attractions'));
    }

    public function update(Request $request, $id) {
        $attractions = Attraction::find($id);
        $attractions ->update($request ->all ());
        return redirect('/attractions')->with('suscess','Data diupdate');
    }


    public function delete ($id) {
    $attractions = Attraction::find($id);
    $attractions-> delete();
      return redirect('/attractions')->with('suscess','Data dihapus');
    }



      
}
