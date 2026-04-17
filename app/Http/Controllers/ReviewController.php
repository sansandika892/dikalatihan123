<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use App\Models\Attraction;

class ReviewController extends Controller
{
    public function index()
    {
        $reviews = Review::all();
        return view('pages.reviews.review', compact('reviews'));
    }

    public function create()
    {
        $attractions = Attraction::all();
        return view('pages.reviews.review_create', compact('attractions'));
    }

    public function store(Request $request)
    {
        Review::create($request->all());

        return redirect('/review');
    }
}