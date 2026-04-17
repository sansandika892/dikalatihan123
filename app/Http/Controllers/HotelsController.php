<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hotel;

class HotelsController extends Controller
{
    /**
     * Tampilkan semua data hotel
     */
    public function index()
    {
        $hotels = Hotel::latest()->get();

        return view('pages.menu.hotels', compact('hotels'));
    }

    /**
     * Form tambah hotel
     */
    public function create()
    {
        return view('pages.menu.hotels-create');
    }

    /**
     * Simpan data hotel baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'        => 'required|max:255',
            'location'    => 'required|max:255',
            'price'       => 'required|numeric',
            'rating'      => 'required|numeric|min:1|max:5',
            'description' => 'nullable'
        ]);

        Hotel::create([
            'name'        => $request->name,
            'location'    => $request->location,
            'price'       => $request->price,
            'rating'      => $request->rating,
            'description' => $request->description
        ]);

        return redirect('/hotels')
            ->with('success', 'Hotel berhasil ditambahkan');
    }

    /**
     * Form edit hotel
     */
    public function edit($id)
    {
        $hotel = Hotel::findOrFail($id);

        return view('pages.menu.hotels-edit', compact('hotel'));
    }

    /**
     * Update data hotel
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'        => 'required|max:255',
            'location'    => 'required|max:255',
            'price'       => 'required|numeric',
            'rating'      => 'required|numeric|min:1|max:5',
            'description' => 'nullable'
        ]);

        $hotel = Hotel::findOrFail($id);

        $hotel->update([
            'name'        => $request->name,
            'location'    => $request->location,
            'price'       => $request->price,
            'rating'      => $request->rating,
            'description' => $request->description
        ]);

        return redirect('/hotels')
            ->with('success', 'Hotel berhasil diupdate');
    }

    /**
     * Hapus hotel
     */
    public function delete($id)
    {
        $hotel = Hotel::findOrFail($id);
        $hotel->delete();

        return redirect('/hotels')
            ->with('success', 'Hotel berhasil dihapus');
    }
}