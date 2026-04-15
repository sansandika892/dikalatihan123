<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attraction;

class AttractionController extends Controller
{
    public function index() {
        $attractions = Attraction::all();
        return view('pages.attractions.index', compact('attractions'));
    }

    public function create(){
        return view('pages.attractions.create');
    }

    public function store(Request $request) {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Attraction::create($validated);
        return redirect('/attractions')->with('success', 'Attraction created successfully');
    }

    public function show($id) {
        $attraction = Attraction::findOrFail($id);
        return view('pages.attractions.show', compact('attraction'));
    }

    public function edit($id) {
        $attraction = Attraction::findOrFail($id);
        return view('pages.attractions.edit', compact('attraction'));
    }

    public function update(Request $request, $id) {
        $attraction = Attraction::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        $attraction->update($validated);
        return redirect('/attractions')->with('success', 'Data updated successfully');
    }

    public function destroy($id) {
        $attraction = Attraction::findOrFail($id);
        $attraction->delete();
        return redirect('/attractions')->with('success', 'Data deleted successfully');
    }
}
