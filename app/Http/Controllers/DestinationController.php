<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('search');
    
        if ($keyword != '') {
            $destinations = Destination::where('name', 'LIKE', '%' . $keyword . '%')->paginate(5);
        } else {
            $destinations = Destination::orderBy('id')->paginate(5);
        }
        return view('pages.destinations.index', compact('destinations'));
    }

    public function show($id)
    {
        $destinations = Destination::findOrFail($id);
        return view('pages.destinations.detail', compact('destinations'));
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
            'location' => 'required|string|max:255',
            'working_days' => 'required|string|max:255',
            'working_hours' => 'required|string|max:255',
            'ticket_price' => 'required|numeric',
            'image' => 'nullable|string|max:2048 mines:jpg,,jpeg,png',
            // Add other fields as per model
        ]);

        Destination::create($validated);
        return redirect()->route('destinations.index')->with('success', 'Destination created successfully.');
    }

    public function edit($id){
        $destination = Destination::findOrFail($id);
        return view('pages.destinations.edit', compact('destination'));
    }

    public function update(Request $request, $id){
        $destination = Destination::findOrFail($id);
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'location' => 'required|string|max:255',
            'working_days' => 'required|string|max:255',
            'working_hours' => 'required|string|max:255',
            'ticket_price' => 'required|numeric',
        ]);

        $destination->update($validated);
        return redirect()->route('destinations.index')->with('success', 'Destination updated successfully.');
    }

    public function delete($id)
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();
        return redirect()->route('destinations.index')->with('success', 'Destination deleted successfully.');
    }
}
