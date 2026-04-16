<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;
use App\Models\Destination;

class AttractionController extends Controller
{
    public function index() {
        $attractions = Attraction::all();
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

        
    }

    public function destroy($id) {
        $attraction = Attraction::findOrFail($id);
        $attraction->delete();
        return redirect('/attractions')->with('success', 'Data deleted successfully');
    }
}
