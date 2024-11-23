<?php

namespace App\Http\Controllers;

use App\Models\Destinations;
use Illuminate\Http\Request;

class DestinationsController extends Controller
{
    public function index() {
        $destinations = Destinations::all();
        return view('admin.destinations.index', compact('destinations'));
    }
}
