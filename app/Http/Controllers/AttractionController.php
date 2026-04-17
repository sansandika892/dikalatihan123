<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\Destination;

class AttractionController extends Controller
{
    public function index(Request $request) 
    {   $keyword = $request->input('search');
    if ($keyword!='') {
        $attractions = Attraction::where('name', 'like', "%$keyword%")->paginate(5);
        }else{$attractions = Attraction::orderby('id')->paginate(5);
        }
        
       

        return view('pages.attractions.index', compact('attractions'));
    }

    public function create(){
        
        $destinations = Destination::all();
        return view('pages.attractions.create', compact('destinations'));

    }

    public function store(Request $request) {
        
            $validated = $request->validate([
            'destination_id' => 'required',
            'name' => 'required|string|max:255',
            'description' => 'nullable',
            ]);


    

        Attraction::create($validated);
        return redirect('/attractions')->with('success', 'Attraction created successfully');
    }

    public function show($id) {
        $attraction = Attraction::findOrFail($id);

        $destination = Destination:: all();
       
        return view('pages.attractions.show', compact('attraction', 'destination'));
    }

    public function edit($id) {
        $destinations = Destination::all();
        
        $attraction = Attraction::findOrFail($id);
        return view('pages.attractions.edit', compact('attraction', 'destinations'));
    }

    public function update(Request $request, $id) {
        $validated = $request->validate([

            'destination_id' => 'required|exists:destinations,id',
            'name' => 'required|string|max:255',
            'description' => 'nullable',

        ]);
        
        $attraction =\App\Models\Attraction::findOrFail($id);
        $attraction->update($validated);
        return redirect('/attractions')->with('success', 'Attraction updated successfully');

        
    }

    public function destroy($id) {
        $attraction = Attraction::findOrFail($id);
        $attraction->delete();
        return redirect('/attractions')->with('success', 'Data deleted successfully');
    }
}
