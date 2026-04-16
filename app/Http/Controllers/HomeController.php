<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;

class HomeController extends Controller
{
    public function index()
    {
$destinations = Destination::all();
        return view('pages.menu.home', compact('destinations'));
    }
}
