<?php

namespace App\Http\Controllers;

use App\Models\destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
    
        if ($keyword != '') {
            $destinations = destination::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        } else {
            $destinations = destination::orderBy('id')->paginate(5);
        }
        return view('pages.destinations.index', compact('destinations'));
    }

    public function show($id)
    {
        $destination = destination::findOrFail($id);
        return view('pages.destinations.detail', compact('destination'));
    }

    public function create()
    {
        return view('pages.destinations.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            // Add other fields as per model
        ]);

        destination::create($validated);
        return redirect()->route('destinations.index')->with('success', 'Destination created successfully.');
    }

    public function edit($id){
        $destination = destination::findOrFail($id);
        return view('pages.destinations.edit', compact('destination'));
    }

    public function update(Request $request, $id){
        $destination = destination::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        $destination->update($validated);
        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully.');
    }

    public function delete($id)
    {
        $destination = destination::findOrFail($id);
        $destination->delete();
        return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully.');
    }
}
